<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produks;
use App\Models\Kategoris;
use File;
use App\Http\Controllers\SlugController;
use Illuminate\Support\Str;
use App\Models\Fotoproduks;
use App\Models\Penggunas;
use App\Models\Orders;
use App\Models\Pesanundangans;
use Illuminate\Support\Facades\DB;

class PenjualanDashboardController extends Controller
{
   //Dashboard
   public function index()
   {

       $toptitle = "Dashboard - List Penjualan";
       $header = false;

       $dataorder = Orders::join('penggunas', function ($join) {
           $join->on('penggunas.kodecustomer', '=', DB::raw("CAST(orders.kodecustomer AS CHAR)"));
       })
                       ->select('orders.*', 'penggunas.namalengkap')
                       ->latest()
                       ->get();
       return view('dashboard/penjualan/tabel', compact('header','toptitle','dataorder'));
       //return view('landingpage.layout');
   }

   public function detail($kodeorder)
    {

        $toptitle = "Dashboard - detail Order Penjualan";
        $header = false;
        $kodeorder = $kodeorder;
        if ($kodeorder) {
            $detail_order = Pesanundangans::where('kodeorder', $kodeorder)
                                         ->join('produks', 'produks.id', '=', 'pesan_undangans.product_id')
                                         ->select('pesan_undangans.*', 'produks.namaproduk', 'produks.hargaproduk')
                                         ->get();
            $pembayaran = Orders::where('kodeorder', $kodeorder)->first();
            if (!$detail_order) {
                return redirect()->back()->with('error', 'Data tidak ditemukan');
            }
            $toptitle = "Dashboard - detail Order Penjualan ($kodeorder)";
        } else {
            return redirect()->back()->with('error', 'Kode Order harus diisi');
        }
        return view('dashboard/penjualan/tabeldetail', compact('header','toptitle','detail_order','pembayaran','kodeorder'));
        //return view('landingpage.layout');
    }

    public function tambah()
    {
        $toptitle = "Tambah Data aset masuk";
        $header = false;
        $kategoris = Kategoris::all();
        return view('produk.tambah', compact('header','toptitle','kategoris'));
        //return view('landingpage.layout');
    }



    public function simpan(Request $request)
    {
        $this->validate($request,[
            'namaproduk' => 'required',
            'hargaproduk' => 'required',
            'deskripsi' => 'required'
        ]);

        

        $namaproduk = $request->namaproduk;
        $slug       = Str::slug($request->namaproduk);
        //SlugService::createSlug(Post::class, 'slug', $post->title);

        
        $filepertama = $request->file('gambar')[0];
        $namafilepertama = time()."_".$filepertama->getClientOriginalName();

        $produk = Produks::create([
            'namaproduk'       => $request->namaproduk,
            'slug'             => $slug,
            'deskripsi'        => $request->deskripsi,
            'hargaproduk'      => $request->hargaproduk,
            'kategoriproduk'   => $request->kategoriproduk,
            'gambar'           => $namafilepertama
        ]);

            //upload gambar
            $files = $request->file('gambar');

            if($files){
                foreach ($files as $file) {
                    $namafile = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = 'images/produk/';
                    $file->move($tujuan_upload,$namafile);
    
                    Fotoproduks::create([
                        'id_produk' => $produk->id,
                        'fotoproduk' => $namafile
                    ]);
                }
            }

        if($produk){
            return redirect('admin/produk')->with('success','Data berhasil disimpan');
        }
        else{
            return redirect()->back()->withInput()->withErrors($request->all())->with('error','Data gagal disimpan, cek kembali form anda');
        }
    }


    public function ubahproduk($id)
    {
        $produk = Produks::find($id);
        $toptitle = "Ubah Data produk";
        $kategoris = Kategoris::all();

        $fotoproduk = Fotoproduks::where('id_produk', $id)->get();

        return view('produk.ubah', ['produk' => $produk,'toptitle' => $toptitle,'kategoris' => $kategoris,'fotoproduk' => $fotoproduk]);
    }


    public function updateproduk(Request $request)
    {
        $this->validate($request,[
            'namaproduk' => 'required',
            'hargaproduk' => 'required',
            'deskripsi' => 'required'
        ]);

        $id = $request->id;
        $produks = Produks::find($id);

        $files = $request->file('gambar');


        if ($files) {
            foreach ($files as $key => $file) {
                $namafile = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'images/produk/';
                $file->move($tujuan_upload,$namafile);

                Fotoproduks::where('id', $request->fotoproduk_id[$key-1])
                    ->update(['fotoproduk' => $namafile]);
            }
        } else {
            $fotoprodukIds = $request->fotoproduk_id ?? [];
            $fotoproduks = Fotoproduks::where('id', $fotoprodukIds)->whereNotIn('id', $fotoprodukIds)->get();
            foreach ($fotoproduks as $fotoproduk) {
                File::delete('/images/produk/'.$fotoproduk->fotoproduk);
                $fotoproduk->delete();
            }
        }
        
        
        $filepertama = $request->file('gambar')[1];
        $namafilepertama = $filepertama ? time()."_".$filepertama->getClientOriginalName() : $request->fotoproduk_lama;

        Produks::whereId($id)->update([
            'deskripsi' => $request->deskripsi,
            'hargaproduk' => $request->hargaproduk,
            'kategoriproduk' => $request->kategoriproduk,
            'slug' => Str::slug($request->namaproduk),
            'namaproduk' => $request->namaproduk,
            'gambar' => 'tes'
        ]);

        return redirect('admin/produk')->with('success','Data berhasil diubah');
    }


    public function hapus($id)
    {
        $produks = Produk::find($id);
        $namafile = $produks->gambar;
        File::delete('/images/aset/'.$namafile);
        if($produks->delete()){
            return redirect('admin/produk')->with('success','Data berhasil dihapus');
        }
        else{
            return redirect('admin/produk')->with('error','Data gagal dihapus');
        }
    }

    // Kategori


    public function tambahkategori()
    {
        $toptitle = "Tambah Data kategori";

        $kategoris = Kategoris::all();
        return view('produk.tambah-kategori', ['toptitle' => $toptitle,'kategoris' => $kategoris]);
    }
    public function ubahkategori($id)
    {
        $dataedit = Kategoris::find($id);
        $toptitle = "Ubah Data kategori";

        $kategoris = Kategoris::all();
        return view('produk.ubah-kategori', ['kategoris' => $kategoris,'toptitle' => $toptitle,'dataedit' => $dataedit]);
    }

    public function simpankategori(Request $request)
    {
        $this->validate($request,[
            'namakategori' => 'required',
            'gambaricon' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        //upload gambaricon
        $gambaricon = $request->gambaricon;
        $namafile = time()."_".$gambaricon->getClientOriginalName();
        $tujuan_upload = 'images/icon';
        $gambaricon->move($tujuan_upload,$namafile);

        $namakategori = $request->namakategori;
        //SlugService::createSlug(Post::class, 'slug', $post->title);

        Kategoris::create([
            'namakategori' => $request->namakategori,
            'icon'         => $namafile
        ]);

        if($gambaricon){
            return redirect('admin/kategori')->with('success','Berhasil Tambah Data Kategori');
        }
        else{
            return redirect()->back()->withInput()->withErrors($request->all())->with('error','Data gagal disimpan, cek kembali form anda');
        }
    }


    public function updatekategori(Request $request)
    {
        $this->validate($request,[
            'namakategori' => 'nullable',
            'gambaricon' => 'nullable|image|mimes:jpeg,jpg,png'
        ]);

        $id = $request->id;
        $produks = Kategoris::find($id);
        $gambaricon = $request->gambaricon;
        if($gambaricon){
            $namafile = time()."_".$gambaricon->getClientOriginalName();
            $tujuan_upload = 'images/icon';
            $gambaricon->move($tujuan_upload,$namafile);
        }
        else{
            $namafile = $produks->gambaricon;
        }

        Kategoris::whereId($id)->update([
            'namakategori' => $request->namakategori,
            'icon' => $namafile
        ]);

        return redirect('admin/produk')->with('success','Data berhasil diubah');
    }


    public function hapuskategori($id)
    {
        $Kategoris = Kategoris::find($id);
        $namafile = $Kategoris->gambaricon;
        File::delete('/images/aset/'.$namafile);
        if($Kategoris->delete()){
            return redirect('admin/produk')->with('success','Data berhasil dihapus');
        }
        else{
            return redirect('admin/produk')->with('error','Data gagal dihapus');
        }
    }


    // Update Status Pengerjaan Per Masing-masing Item/Produk

    public function updatestatuspengerjaan(Request $request, $id)
    {
        $orderdetail = Pesanundangans::find($id);
        $orderdetail->statuspengerjaan = $request->statuspengerjaan;
        $orderdetail->update();

        return redirect()->back()->with('success', 'Status Order berhasil diubah!');
    }


    // INI UPDATE STATUS ALL ORDER
    public function updatestatusorder(Request $request, $id)
    {
        $orderdetail = Orders::find($id);
        $orderdetail->statuspengerjaan = $request->statuspengerjaan;
        $orderdetail->update();

        return redirect()->back()->with('success', 'Status Order berhasil diubah!');
    }
}
