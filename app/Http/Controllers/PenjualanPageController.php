<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Orders;
use App\Models\Pesanundangans;
use Session;
use App\Models\Produks;

use Illuminate\Support\Str;


class PenjualanPageController extends Controller
{
    //
    
    public function simpanPenjualan()
    {
        
        $namalengkap    = Session::get('namalengkap');
        $statuslogin    = Session::get('statuslogin');
        $kodecustomer   = Session::get('kodecustomer');
        $berhasil_login_pengguna = Session::get('berhasil_login_pengguna');
        $kodeorder      = Session::get('kodeorder');
        //echo $namalengkap."<br>".$statuslogin."<br>".$berhasil_login_pengguna;
        
        if ($berhasil_login_pengguna == true){
            $cart = Cart::content();
            //foreach ($cart as $c) {

            
            $jumlah_pesanan = array();
            foreach ($cart as $c) {
                $harga_produk = Produks::where('id', $c->id)->value('hargaproduk');
                $jumlah_pesanan[$c->id] = $c->qty * $harga_produk;
            }
            
            $order = Pesanundangans::where('kodeorder', $kodeorder)->first();
            if($order){

            
                // $order = new \App\Models\Orders;
                // $order->kodecustomer = $kodecustomer;
                // $order->kodeorder    = $kodeorder;
                // $order->status       = "Pending";
                // $order->statuspengerjaan = "Belum Diproses";
                foreach ($jumlah_pesanan as $key => $value) {
                    $order->totalbayar += $value;
                }

                // $order->save();

                $transaksi = Orders::create([
                    'kodecustomer'      => $kodecustomer,
                    'kodeorder'         => $order->kodeorder,
                    'totalbayar'        => $order->totalbayar,
                    'status'            => "Pending",
                    'statuspengerjaan'  => "Belum Diproses",
                ]);

                // Set your Merchant Server Key
                \Midtrans\Config::$serverKey = config('midtrans.serverKey');
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = true;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;

                $params = array(
                    'transaction_details' => array(
                        'order_id' => $kodeorder,
                        'gross_amount' => $order->totalbayar,
                    ),
                    'customer_details' => array(
                        'first_name' => $order->kodecustomer.'-'.$namalengkap,
                        'email' => $order->kodecustomer,
                    ),
                );

                $snapToken = \Midtrans\Snap::getSnapToken($params);
                $transaksi->snap_token = $snapToken;
                $transaksi->save();
            }
            
                // $order->totalbayar   = Cart::total();
                // $order->save();
            //}

            // foreach ($cart as $c) {
            //     $order->kodeorder   = $kodeorder;
            //     $order->product_id  = $c->id;
            //     $order->quantity    = $c->qty;
            //     $order->price       = $c->id;
            //     $order->total       = $c->id;
            //     $order->statusaksi  = "Belum Bayar";
            // }

            Cart::destroy();
            Session::forget('kodeorder');
            
            return redirect('/pembayaran/'.$kodeorder)->with('success', 'Pembeliahan Berhasil, Silahkan Lakukan Pembayaran');
            
        } else {
            return redirect('/daftar')->with('error', 'Silahkan Daftar terlebih dahulu');
        }
    }

    public function pesanpenjualan()
    {
        
        $header = false;
        $title = "Checkout";
        return view('cart/pesanpenjualan', compact('header', 'title'));
    }

    // List transaksi yang telah dilakukan
    public function riwayatorder() {

        $header = false;
        $title = "Riwayat Order";

        $kodecustomer = Session::get('kodecustomer');
        $orders = \App\Models\Orders::where('kodecustomer', $kodecustomer)->latest()->get();
        return view('cart/riwayatorder', compact('orders', 'header', 'title'));
    }

    public function detail($kodeorder)
    {

        $toptitle = "detail Order Penjualan";
        $header = false;
        $kodeorder = $kodeorder;
        if ($kodeorder) {
            $detail_order = Pesanundangans::where('kodeorder', $kodeorder)
                                          ->join('produks', 'produks.id', '=', 'pesan_undangans.product_id')
                                          ->select('pesan_undangans.*', 'produks.namaproduk', 'produks.hargaproduk')
                                          ->get();
            if (!$detail_order) {
                return redirect()->back()->with('error', 'Order tidak ditemukan');
            }
            $toptitle = "Dashboard - detail Order Penjualan ($kodeorder)";
        } else {
            return redirect()->back()->with('error', 'Kode Order harus diisi');
        }
        return view('cart/riwayatorderdetail', compact('header','toptitle','detail_order'));
        //return view('landingpage.layout');
    }

    public function pembayaran($kodeorder)
    {
error_reporting(0);
        $toptitle = "Pembayaran Pembelian, Kode Order $kodeorder";
        $header = false;
        $kodeorder = $kodeorder;
        if ($kodeorder) {
            $total_bayar = 0;
            $detail_order = Pesanundangans::where('kodeorder', $kodeorder)
                ->join('produks', 'produks.id', '=', 'pesan_undangans.product_id')
                ->select('pesan_undangans.*', 'produks.namaproduk','produks.hargaproduk')
                ->get();

            $totalBayar = Orders::where('kodeorder', $kodeorder)->value('totalbayar');
            $snap_token = Orders::where('kodeorder', $kodeorder)->value('snap_token');
            $total_bayar = $detail_order->totalbayar = $totalBayar;
            
            if (!$detail_order) {
                return redirect()->back()->with('error', 'Order tidak ditemukan');
            }
            $toptitle = "Form Pembayaran ($kodeorder)";
        } else {
            return redirect()->back()->with('error', 'Kode Order harus diisi');
        }
        return view('cart/pembayaran', compact('header','toptitle','detail_order','kodeorder','total_bayar','snap_token'));
        //return view('landingpage.layout');
    }

    
    public function pembayaranselesai(Request $request, $kodeorder){
        $request->validate([
            'namarekening' => 'nullable',
            'nominaltransfer' => 'nullable',
            'gambarbukti' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = Orders::where('kodeorder', $kodeorder)->first();
        $data->namarekening = $request->namarekening;
        $data->nominaltransfer = $request->nominaltransfer;
        
        if($request->hasFile('gambarbukti')){
            $file = $request->file('gambarbukti');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/pembayaran', $filename);
            $data->gambarbukti = $filename;
        }

        $data->status = 'Menunggu Konfirmasi Admin';
        $data->update();

        return redirect()->back()->with('success', 'Pembayaran Telah Berhasil Dilakukan!, Akan Kami Proses');
    }

    
    public function sukses($kodeorder){
        $header = false;
        $toptitle = "Pembayaran Sukses ($kodeorder)";
        $orders = Orders::where('kodeorder', $kodeorder)->first();
        $orders->status = 'Lunas';
        $orders->update();
        return view('cart/sukses', compact('header','toptitle','orders'));
    }

    public function gagal($kodeorder){
        $header = false;
        $toptitle = "Pembayaran Gagal ($kodeorder)";
        $orders = Orders::where('kodeorder', $kodeorder)->first();
        $orders->status = 'Gagal';
        $orders->update();
        return view('cart/gagal', compact('header','toptitle','orders'));
    }

    public function pending($kodeorder){
        $header = false;
        $toptitle = "Pembayaran Pending ($kodeorder)";
        $orders = Orders::where('kodeorder', $kodeorder)->first();
        $orders->status = 'Pending';
        $orders->update();
        return view('cart/pending', compact('header','toptitle','orders'));
    }
    
    
    
}
