<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPageController extends Controller
{
    public function index()
    {
        //$products = Product::latest()->paginate(5);
        //$berita = Berita::latest()->paginate(5);
        //$kegiatan = Kegiatan::latest()->paginate(5);
        $toptitle = "Dashboard";
        // $acara = "Apa Yang Terjadi"; 
        // $pengalaman = "Pengalaman Mereka.";
        // $header     = true;
        // $ceritalain = true;
        // $navhalaman = false;
        return view('admindashboard.index', compact('toptitle'));
        //return view('landingpage.layout');
    }
}
