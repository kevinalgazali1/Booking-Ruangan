<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data ruangan yang dikirim dari form
        $request->validate([
            'namaRuangan' => 'required|string|max:255',
            'Lokasi'      => 'required|string|max:255',
            'kapasitas'   => 'required|integer|min:1',
            'deskripsi'   => 'required|string',
        ]);

        // Simpan data ruangan baru ke database
        Room::create([
            'namaRuangan' => $request->namaRuangan,
            'Lokasi'      => $request->Lokasi,
            'kapasitas'   => $request->kapasitas,
            'deskripsi'   => $request->deskripsi,
        ]);

        // Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Ruangan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'namaRuangan' => 'required|string|max:255',
            'Lokasi'      => 'required|string|max:255',
            'kapasitas'   => 'required|integer|min:1',
            'deskripsi'   => 'required|string',
        ]);

        // Cari data ruangan berdasarkan ID
        $room = Room::findOrFail($id);

        // Update data ruangan
        $room->update([
            'namaRuangan' => $request->namaRuangan,
            'Lokasi'      => $request->Lokasi,
            'kapasitas'   => $request->kapasitas,
            'deskripsi'   => $request->deskripsi,
        ]);

        // Redirect dengan notifikasi sukses
        return redirect()->back()->with('success', 'Ruangan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Cari data ruangan berdasarkan ID
        $room = Room::findOrFail($id);

        // Hapus data ruangan
        $room->delete();

        // Redirect dengan notifikasi sukses
        return redirect()->back()->with('success', 'Ruangan berhasil dihapus!');
    }


    public function jamTerpakai(Request $request)
    {
        // Validasi agar room_id dan tanggal sesuai format yang benar
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'tanggal' => 'required|date'
        ]);

        // Ambil semua booking yang sudah disetujui pada tanggal tertentu
        $booked = Booking::where('room_id', $request->room_id)
            ->where('tanggal_booking', $request->tanggal)
            ->where('status', 'approved')
            ->get(['waktu_mulai', 'waktu_akhir']);

        // Kembalikan data waktu booking dalam format JSON
        return response()->json($booked);
    }
}
