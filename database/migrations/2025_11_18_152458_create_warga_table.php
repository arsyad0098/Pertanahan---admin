<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id('warga_id');
            $table->string('no_ktp')->unique();
            $table->string('nama');
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
