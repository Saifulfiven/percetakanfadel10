<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produks;
use App\Models\Kategoris;
use App\Models\Pengalamans;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Controllers\SlugController;
use App\Models\Fotoproduks;
use Illuminate\Support\Str;

class LandingPageController extends Controller
{
    //
    public function index()
    {
        $berita = "Berita";
        $header = true;
        
        //$produk = Produks::with('kategoris')->get()->groupBy('kategoris.id');
        
        if (!Session::has('kodeorder')) {
            Session::put('kodeorder', Str::random(6));
        }
        
        $kategori   = Kategoris::all();
        $produk     = Produks::all();
        //return $produk;
        
        $produkfavorit = Produks::where('favorit', 'mantap')
                                ->where('statusaktif', 'aktif')
                                ->get();
        return view('landingpage.index', compact( 'berita','header','produk','kategori','produkfavorit'));
    }

    public function detailproduk($slug)
    {
        $berita = "Berita";
        $acara = "Apa Yang Terjadi";
        $header = false;
        $judulpengalaman = "Detail Produk - $slug";
        
        $produk = Produks::where('slug', $slug)->first();
        //return $produk;
        
        $kategori = Kategoris::find($produk->kategoriproduk);
        $nama_kategori = $kategori->namakategori;
        //return $nama_kategori;
        $produk->nama_kategori = $nama_kategori;

        $fotoproduk = Fotoproduks::where('id_produk', $produk->id)->get();
        $fotoprodukpertama = Fotoproduks::where('id_produk', $produk->id)->first();
        if ($fotoprodukpertama == null) {
            $fotoprodukpertama = new Fotoproduks(); 
            $fotoprodukpertama->fotoproduk = 'gambarkosong.jpg';
        }
        //$produk->fotoproduk = $fotoproduk;
        $produkfavorit = Produks::where('favorit', 'mantap')
                                ->where('statusaktif', 'aktif')
                                ->get();

        return view('shopdetail.index', compact('produk', 'judulpengalaman', 'berita', 'acara','header','fotoproduk','fotoprodukpertama','kategori','produkfavorit'));
    }


    public function semuaproduk()
    {

        $berita = "Semua Produk";
        $acara = "Apa Yang Terjadi";
        $header = false;

        return view('shop.index', compact('berita', 'acara','header'));
    }

    public function hubungikami()
    {

        $berita = "Semua Produk";
        $acara = "Apa Yang Terjadi";
        $header = false;

        return view('landingpage.hubungi-kami', compact('berita', 'acara','header'));
    }


}

