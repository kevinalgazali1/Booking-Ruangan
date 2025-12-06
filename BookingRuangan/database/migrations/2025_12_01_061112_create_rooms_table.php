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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('namaRuangan'); // Nama ruangan
            $table->string('Lokasi'); // Lokasi ruangan
            $table->integer('kapasitas'); // Kapasitas ruangan
            $table->text('deskripsi'); // Deskripsi ruangan
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms'); // Hapus tabel rooms
    }
};
