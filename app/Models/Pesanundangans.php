<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanundangans extends Model
{
    use HasFactory;
    
    protected $table = 'pesan_undangans';

    protected $fillable = [
        'kodeorder',
        'kodedesain',
        'detailcustomer',
        'catatantambahan',
        'product_id',
        'row_id',
        'stikerpanjang',
        'stikerlebar',
        'stikerbahan',
        'keterangan',
        'jumlahpesanan',
        'uploadfile',
        'statuspengerjaan',
        'cartkodeproduk'
    ];

}
