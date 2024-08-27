<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunas extends Model
{
    use HasFactory;
    protected $fillable = [
        'username', 
        'password', 
        'namalengkap', 
        'no_hp', 
        'jeniskelamin', 
        'tahunlahir', 
        'alamat', 
        'remember_token', 
        'statuslogin', 
        'cobalogin',
        'kodecustomer'
    ];
}
