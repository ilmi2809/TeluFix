<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class
        ]);
    }

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('password');
        });
    }
}
