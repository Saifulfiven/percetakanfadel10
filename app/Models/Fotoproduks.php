<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotoproduks extends Model
{
    use HasFactory;

    protected $fillable = ['fotoproduk', 'id_produk'];

}