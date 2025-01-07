<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $fillable = [
        'user_id',
        'jenis_masalah',
        'deskripsi',
        'publikasi',
        'gambar'
    ];


    protected $table = 'aspirasi';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
