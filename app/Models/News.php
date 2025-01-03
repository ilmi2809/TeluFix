<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'tanggal',
    ];
}
