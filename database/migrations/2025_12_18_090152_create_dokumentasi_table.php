<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->id('dokumentasi_id');
            $table->string('judul');
            $table->text('keterangan')->nullable();
            $table->string('foto');
            $table->date('tanggal_foto')->nullable();
            $table->string('lokasi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumentasi');
    }
};