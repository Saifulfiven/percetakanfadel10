<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Produks;
use Illuminate\Support\Str;
use App\Models\Pesanundangans;
class CartController extends Controller
{
    //
    public function index()
    {
        $header = false;
        $title = "Checkout";
        $cartItems = Cart::content();

        $lastPesanUndangan = Pesanundangans::where('kodeorder', session('kodeorder'))->orderBy('id', 'desc')->first();
        if ($lastPesanUndangan) {
            $rowIdPesanUndangan = $lastPesanUndangan->id;
            $rowIdTerbaru = $cartItems->pluck('rowId')->last();

            Pesanundangans::where('id', $rowIdPesanUndangan)->update(['row_id' => $rowIdTerbaru]);
           // echo $rowIdTerbaru;
            
        }
        return view('cart.index', compact('cartItems','header','title'));
    }
//    tampilkan pesan_undangans terbaru dari session kode_order lalu masukkan nilai ke row_id pesan_undangans dari cart::rowid

    public function store(Request $request)
    {
        //$Produks = Produks::find($request->id);
        // Ambil data dari request
    $id             = $request->input('id');
    $kodeproduk     = $request->input('kodeproduk');
    $namaproduk     = $request->input('namaproduk');
    $jumlahpesanan  = $request->input('jumlahpesanan');
    $hargaproduk    = $request->input('hargaproduk');
    $kategori       = $request->input('kategori');

    $kucluk         = 'kucluk';

        // $kodedesain = Str::random(5);
        $pesanan = new \App\Models\Pesanundangans();
        $pesanan->kodeorder = session('kodeorder');

        if($kategori == '10'){ // Undangan Fisik
            $kodedesain     = $request->input('kode-desain');
            $pesanan->kodedesain = $kodedesain;
        }else if($kategori == '2'){ // Stiker & Label Kemasan
            $pesanan->stikerpanjang = $request->input('panjang_cm');
            $pesanan->stikerlebar   = $request->input('lebar_cm');
            $pesanan->stikerbahan   = $request->input('jenis_bahan');
        }else if($kategori == '6'){ // Stiker & Label Kemasan
            $pesanan->stikerpanjang = $request->input('panjang_cm');
            $pesanan->stikerlebar   = $request->input('lebar_cm');
            $pesanan->stikerbahan   = $request->input('jenis_bahan');
        }else if($kategori == '11'){ // Kartu Nama
            $pesanan->kodedesain = $request->input('kode-desain');
            $pesanan->stikerbahan   = $request->input('jenis_bahan');
            $pesanan->finishing   = $request->input('finishing');
        }

        
        if($request->hasFile('fileupload')){
            $file = $request->file('fileupload');
            $fileName = $file->getClientOriginalName();
        
        $file->move('assets/uploadfile', $fileName);
            $pesanan->uploadfile = $fileName;
        }

        //$rowid = Cart::content()->pluck('rowId')->first(); //ambil rowid cart

        //$pesanan->cartkodeproduk = $rowid;
        $pesanan->keterangan = $request->input('detailcustomer');
        $pesanan->detailcustomer = "kosong";
        $pesanan->product_id = $id;
        $pesanan->jumlahpesanan = $jumlahpesanan;
        $pesanan->save();

    // Tambahkan item ke keranjang
    
//    Cart::add($id, $namaproduk, $jumlahpesanan, $hargaproduk, 1);
        Cart::add($id, $namaproduk, $jumlahpesanan, $hargaproduk, 1);
        //Cart::add($request->kodeproduk, $request->namaproduk, 1, $request->hargaproduk, $request->jumlahpesanan);

        return redirect()->route('cart.index')->with('success', 'Produks added to cart.');
    }

    public function update(Request $request, $rowId)
    {
        Cart::update($rowId, $request->qty);

        \App\Models\Pesanundangans::where('kodeorder', session('kodeorder'))->where('row_id', $rowId)->update(['jumlahpesanan' => $request->qty]);
        return redirect()->route('cart.index')->with('success', 'Cart updated.');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.index')->with('success', 'Produks removed from cart.');
    }
}
