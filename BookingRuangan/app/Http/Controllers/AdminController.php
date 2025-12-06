<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data ruangan
        $rooms = Room::all();

        // Kirim data ke halaman dashboard admin
        return view('admin.dashboard', compact('rooms'));
    }

    public function bookingAdmin()
    {
        // Ambil semua booking beserta relasi user dan room
        $bookings = Booking::with(['user', 'room'])->get();

        // Kirim data ke halaman booking admin
        return view('admin.booking', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        // Validasi input status
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        // Update status booking
        $booking->update($validated);

        // Jika status benar-benar berubah
        if ($booking->wasChanged('status')) {
            try {
                $user = $booking->user;

                // Ambil nomor WA user dan bersihkan format
                $nomorTujuan = preg_replace('/[^0-9]/', '', $user->no_wa);

                // Ubah format 08xxxx menjadi 628xxxx
                if (substr($nomorTujuan, 0, 2) === '08') {
                    $nomorTujuan = '62' . substr($nomorTujuan, 1);
                }

                if ($nomorTujuan) {

                    // Konversi status ke kalimat
                    $statusKalimat = [
                        'approved' => 'disetujui',
                        'rejected' => 'ditolak',
                        'pending'  => 'menunggu konfirmasi'
                    ];

                    $statusText = $statusKalimat[$validated['status']] ?? $validated['status'];

                    // Susun isi pesan WA
                    $pesan  = "Halo, *{$user->name}*!\n\n";
                    $pesan .= "Pengajuan booking ruangan Anda telah *{$statusText}*.\n\n";
                    $pesan .= "Detail booking:\n";
                    $pesan .= "• Ruangan: *{$booking->room->namaRuangan}*\n";
                    $pesan .= "• Tanggal: *{$booking->tanggal_booking}*\n";
                    $pesan .= "• Waktu: *{$booking->waktu_mulai} - {$booking->waktu_akhir}*\n";
                    $pesan .= "• Tujuan: *{$booking->tujuan}*\n\n";

                    // Pesan tambahan sesuai status
                    if ($validated['status'] == 'approved') {
                        $pesan .= "Ruangan telah *disetujui* dan bisa digunakan sesuai jadwal.";
                    } elseif ($validated['status'] == 'rejected') {
                        $pesan .= "Mohon maaf, pengajuan Anda *ditolak*. Silakan ajukan kembali.";
                    } else {
                        $pesan .= "Booking Anda *menunggu konfirmasi* admin.";
                    }

                    // Kirim pesan WA ke API Fonnte
                    $response = Http::withHeaders([
                        'Authorization' => env('WHATSAPP_TOKEN')
                    ])->post('https://api.fonnte.com/send', [
                        'target' => $nomorTujuan,
                        'message' => $pesan
                    ]);

                    // Simpan hasil respon API ke log
                    Log::info('Respon API WA:', $response->json());
                }
            } catch (\Exception $e) {
                // Catat error jika pengiriman gagal
                Log::error('Gagal kirim WA: ' . $e->getMessage());
            }
        }

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Status booking berhasil diperbarui!');
    }
}
