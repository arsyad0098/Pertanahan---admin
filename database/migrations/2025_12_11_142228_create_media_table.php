<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id('media_id');
            $table->string('ref_table'); // Nama tabel referensi (contoh: 'persil')
            $table->unsignedBigInteger('ref_id'); // ID dari tabel referensi
            $table->string('file_name'); // Nama file yang disimpan
            $table->string('caption')->nullable(); // Keterangan/caption file
            $table->string('mime_type'); // Tipe file (image/jpeg, application/pdf, dll)
            $table->integer('sort_order')->default(0); // Urutan tampil
            $table->timestamps();

            // Index untuk performa query
            $table->index(['ref_table', 'ref_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};