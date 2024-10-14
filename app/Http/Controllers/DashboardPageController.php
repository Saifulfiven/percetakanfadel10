<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produks;
use App\Models\Orders;

class DashboardPageController extends Controller
{
    public function index()
    {
        $toptitle = "Dashboard";
        $jumlahproduk = Produks::count();
        $jumlahtransaksi = \App\Models\Orders::count();
        $jumlahtransaksipengerjaan = Orders::where('statuspengerjaan','!=','Selesai')->count();
        $jumlahpengguna = \App\Models\Penggunas::count();

        $tanggalhariini = date('Y-m-d');
        $jumlahtransaksiperhari = Orders::where('created_at', $tanggalhariini)->get();

        return view('admindashboard.index', compact('toptitle','jumlahproduk','jumlahtransaksi',
                    'jumlahtransaksipengerjaan','jumlahpengguna','jumlahtransaksiperhari'));   
    }

}
