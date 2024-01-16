<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $fillable = [
        'peminjaman_id',
        'nomor_plat',
        'jumlah_hari',
        'biaya_sewa',
        // Kolom-kolom lain yang mungkin Anda miliki
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}