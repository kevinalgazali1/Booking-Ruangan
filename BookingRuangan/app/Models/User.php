<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Kolom yang boleh di–mass assign
    protected $fillable = [
        'name',
        'no_wa',
        'email',
        'role',
        'password',
    ];

    // Kolom yang disembunyikan saat data di-serialize
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tipe data yang perlu di-cast otomatis oleh Laravel
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // ubah ke objek tanggal
            'password' => 'hashed',            // hash otomatis ketika diset
        ];
    }

    public function booking()
    {
        // Relasi: user memiliki banyak booking
        return $this->hasMany(Booking::class);
    }

    public function file()
    {
        // Relasi ini sama seperti booking() (kemungkinan salah relasi)
        // Saat ini: user memiliki banyak booking
        return $this->hasMany(Booking::class);
    }
}
