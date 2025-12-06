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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // Primary key

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade'); // Hapus booking jika user dihapus

            $table->foreignId('room_id')
                ->constrained('rooms')
                ->onDelete('cascade'); // Hapus booking jika room dihapus

            $table->date('tanggal_booking'); // Tanggal pemakaian ruangan
            $table->time('waktu_mulai'); // Jam mulai
            $table->time('waktu_akhir'); // Jam selesai

            $table->string('tujuan'); // Tujuan penggunaan ruangan

            $table->enum('status', ['pending', 'approved', 'rejected'])
                ->default('pending'); // Status booking

            $table->text('admin_note')->nullable(); // Catatan admin (optional)

            $table->boolean('wa_sent')->default(false); // Penanda apakah WA notifikasi sudah dikirim

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings'); // Hapus tabel bookings
    }
};
