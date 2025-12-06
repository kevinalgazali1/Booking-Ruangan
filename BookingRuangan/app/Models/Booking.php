<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Lindungi kolom 'id' agar tidak bisa diisi manual
    protected $guarded = ['id'];

    public function user()
    {
        // Relasi: booking dimiliki oleh satu user
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        // Relasi: booking terkait dengan satu ruangan
        return $this->belongsTo(Room::class);
    }
}
