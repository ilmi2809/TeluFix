<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('aspirasi', function (Blueprint $table) {
            // Drop kolom publikasi yang lama
            $table->dropColumn('publikasi');
        });

        Schema::table('aspirasi', function (Blueprint $table) {
            // Buat kolom baru dengan spesifikasi yang benar
            $table->string('publikasi')->after('deskripsi');
        });
    }

    public function down()
    {
        Schema::table('aspirasi', function (Blueprint $table) {
            $table->dropColumn('publikasi');
            $table->enum('publikasi', ['Bersedia', 'Tidak Bersedia'])->after('deskripsi');
        });
    }
};
