<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produks extends Model
{
    use HasFactory;
    protected $fillable = [
        'kodeproduk',
        'namaproduk',
        'slug',
        'deskripsi',
        'kategoriproduk',
        'hargaproduk',
        'gambar','satuan','statusaktif',
        'favorit'
    ];

    public function kategoris()
    {
        return $this->belongsToMany(Kategoris::class);
    }
}
