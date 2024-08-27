<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Pengalamans extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_profilalumni',
        'judul',
        'nama',
        'programstudi',
        'angkatan',
        'jabatan',
        'pekerjaan',
        'detail',
        'foto'
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($post) {
    //         $post->slug = Str::slug($post->title);
    //     });

    //     static::updating(function ($post) {
    //         $post->slug = Str::slug($post->title);
    //     });
    // }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

}
