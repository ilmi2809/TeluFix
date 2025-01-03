<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->enum('jenis_masalah', ['kerusakan', 'kehilangan', 'kebersihan', 'pencahayaan', 'lainnya']);
            $table->text('deskripsi');
            $table->date('tanggal_kejadian');
            $table->time('waktu_kejadian');
            $table->string('lokasi');
            $table->string('gambar')->nullable();
            $table->enum('status', ['belum_verifikasi', 'dalam_pengerjaan', 'selesai'])->default('belum_verifikasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
};