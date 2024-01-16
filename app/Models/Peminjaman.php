<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';
    protected $fillable = [
        'user_id',
        'car_id',
        'tanggal_mulai',
        'tanggal_selesai',
        // Kolom-kolom lain yang mungkin Anda miliki
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'car_id');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}