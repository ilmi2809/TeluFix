<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasi';

    protected $fillable = [
        'user_id',
        'jenis_masalah',
        'deskripsi',
        'publikasi',
        'gambar'
    ];

    protected $attributes = [
        'publikasi' => 'Tidak Bersedia'  // default value
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
