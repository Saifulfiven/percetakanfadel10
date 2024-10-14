<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'kodecustomer',
        'kodeorder',
        'status','totalbayar','waktupesan','statuspengerjaan',
        'snap_token'
    ];
}
