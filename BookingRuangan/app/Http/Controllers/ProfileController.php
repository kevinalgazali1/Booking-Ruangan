<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Tampilkan halaman edit profil dengan data user yang sedang login
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Isi data user dengan input yang sudah divalidasi
        $request->user()->fill($request->validated());

        // Jika email diganti, verifikasi email direset menjadi null
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Simpan perubahan profil
        $request->user()->save();

        // Redirect kembali ke halaman edit profil dengan pesan status
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validasi password untuk memastikan pemilik akun yang menghapus
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Ambil user yang sedang login
        $user = $request->user();

        // Logout user sebelum penghapusan
        Auth::logout();

        // Hapus user dari database
        $user->delete();

        // Hapus sesi dan buat token baru
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan ke halaman utama
        return Redirect::to('/');
    }
}
