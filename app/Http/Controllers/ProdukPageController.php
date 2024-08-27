<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produks;
use App\Models\Kategoris;
use File;
use App\Http\Controllers\SlugController;
use Illuminate\Support\Str;
use App\Models\Fotoproduks;

class ProdukPageController extends Controller
{
    // Landing Page
    public function index()
    {
        //$produk = produk::latest()->paginate(5);
        $produk = "Produk masuk";
        $header = false;
        return view('produk.index', compact('produk','header'));
        //return view('landingpage.layout');
    }


    //Dashboard

    public function home()
    {

        $toptitle = "Dashboard - List produk";
        $header = false;
        $produks = Produks::select('produks.*', 'kategoris.namakategori')
            ->join('kategoris', 'produks.kategoriproduk', '=', 'kategoris.id')
            ->get();

        $kategoris = Kategoris::all();
        $kategoris = $kategoris->pluck('nama_kategori','id');
        return view('produk.tabel', compact('header','toptitle','produks','kategoris'));
        //return view('landingpage.layout');
    }


    public function tambah()
    {
        $toptitle = "Tambah Data Produk masuk";
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
        
        
        $filepertama = $request->file('gambar')[1] ?? null;
        $namafilepertama = $filepertama ? time()."_".$filepertama->getClientOriginalName() : $request->fotoproduk_lama;

        Produks::whereId($id)->update([
            'deskripsi' => $request->deskripsi,
            'hargaproduk' => $request->hargaproduk,
            'kategoriproduk' => $request->kategoriproduk,
            'slug' => Str::slug($request->namaproduk),
            'namaproduk' => $request->namaproduk,
            'satuan' => $request->satuan,
            'statusaktif' => $request->statusaktif,
            'gambar' => $namafilepertama
        ]);

        return redirect('admin/produk')->with('success','Data berhasil diubah');
    }


    public function hapus($id)
    {
        $produks = Produks::find($id);
        $namafile = $produks->gambar;
        File::delete('/images/produk/'.$namafile);
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
        $namafile = $Kategoris->icon;
        File::delete('/images/produk/'.$namafile);
        if($Kategoris->delete()){
            return redirect('admin/produk')->with('success','Data berhasil dihapus');
        }
        else{
            return redirect('admin/produk')->with('error','Data gagal dihapus');
        }
    }
}
