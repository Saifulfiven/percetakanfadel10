<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asets;

class AsetPageController extends Controller
{
    // Landing Page
    public function index()
    {
        //$aset = aset::latest()->paginate(5);
        $aset = "Aset";
        $header = false;
        return view('aset.index', compact('aset','header'));
        //return view('landingpage.layout');
    }

    public function stockopname()
    {
        //$aset = aset::latest()->paginate(5);
        $toptitle = " Tambah Riwayat Peminjaman";;
        $aset = "aset";
        $header = false;
        return view('aset.stockopname', compact('aset','header','toptitle'));
        //return view('landingpage.layout');
    }


    //Dashboard

    public function home()
    {

        $toptitle = "Dashboard - aset";
        $header = false;
        //$asets = asets::latest()->paginate(5);
        return view('aset.tabel', compact('header','toptitle'));
        //return view('landingpage.layout');
    }

    public function tambah()
    {
        //$products = Product::latest()->paginate(5);
        //$aset = aset::latest()->paginate(5);
        //$kegiatan = Kegiatan::latest()->paginate(5);
        $toptitle = "NOBEL INDONESIA :. Tambah Data aset";
        $header = false;
        return view('aset.tambah', compact('header','toptitle'));
        //return view('landingpage.layout');
    }


    public function simpan(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        //upload gambar
        $gambar = $request->gambar;
        $namafile = time()."_".$gambar->getClientOriginalName();
        $tujuan_upload = 'images/aset';
        $gambar->move($tujuan_upload,$namafile);

        $judulnya = $request->judul;
        //SlugService::createSlug(Post::class, 'slug', $post->title);

        asets::create([
            'judul' => $request->judul,
            'slug' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        if($gambar){
            return redirect('admin/aset')->with('success','Data berhasil disimpan');
        }
        else{
            return redirect()->back()->withInput()->withErrors($request->all())->with('error','Data gagal disimpan, cek kembali form anda');
        }
    }


    public function ubah($id)
    {
        $asets = asets::find($id);
        $toptitle = "NOBEL INDONESIA :. Ubah Data aset";
        return view('aset.ubah', ['dataubah' => $asets,'toptitle' => $toptitle]);
    }


    public function update(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png'
        ]);

        $id = $request->id;
        $asets = asets::find($id);
        $gambar = $request->gambar;
        if($gambar){
            $namafile = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'images/aset';
            $gambar->move($tujuan_upload,$namafile);
        }
        else{
            $namafile = $asets->gambar;
        }

        asets::whereId($id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        return redirect('admin/aset')->with('success','Data berhasil diubah');
    }


    public function hapus($id)
    {
        $asets = asets::find($id);
        $namafile = $asets->gambar;
        File::delete('/images/aset/'.$namafile);
        if($asets->delete()){
            return redirect('admin/aset')->with('success','Data berhasil dihapus');
        }
        else{
            return redirect('admin/aset')->with('error','Data gagal dihapus');
        }
    }
}
