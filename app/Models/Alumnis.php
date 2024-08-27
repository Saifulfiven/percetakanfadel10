<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnis extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_studi',
        'nim',
        'tahun_selesai'
    ];
}
