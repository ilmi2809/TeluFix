<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'jenis_masalah',
        'deskripsi',
        'tanggal_kejadian',
        'waktu_kejadian',
        'lokasi',
        'gambar',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}