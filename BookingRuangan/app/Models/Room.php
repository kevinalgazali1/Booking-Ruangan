<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // Lindungi kolom 'id' agar tidak dapat diisi secara mass assignment
    protected $guarded = ['id'];

    public function booking()
    {
        // Relasi: satu ruangan bisa memiliki banyak booking
        return $this->hasMany(Booking::class);
    }
}
