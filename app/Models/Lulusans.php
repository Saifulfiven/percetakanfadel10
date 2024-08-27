<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lulusans extends Model
{
    use HasFactory;
    protected $fillable = [
        'prodi',
        'nim',
        'namalengkap','status_tf','status','email','nik'
    ];
}
