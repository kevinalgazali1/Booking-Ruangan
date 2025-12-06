<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua ruangan beserta relasi booking
        $rooms = Room::with('booking')->get();

        // Tampilkan halaman dashboard user
        return view('user.dashboard', compact('rooms'));
    }

    public function store(Request $request)
    {
        // Validasi input booking dari user
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'tanggal_booking' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_akhir' => 'required|date_format:H:i',
            'tujuan' => 'required|string',
        ]);

        // Simpan data booking baru ke database
        Booking::create([
            'user_id' => auth()->id(),   // ID user yang sedang login
            'room_id' => $request->room_id,
            'tanggal_booking' => $request->tanggal_booking,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_akhir' => $request->waktu_akhir,
            'tujuan' => $request->tujuan,
        ]);

        // Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Booking berhasil dibuat!');
    }

    public function booking()
    {
        // Ambil semua booking user yang sedang login beserta relasi user & room
        $bookings = Booking::with(['user', 'room'])
            ->where('user_id', auth()->id())
            ->get();

        // Tampilkan halaman daftar booking user
        return view('user.booking', compact('bookings'));
    }
}
