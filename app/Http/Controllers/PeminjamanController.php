<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Mobil;
use App\Models\User;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Ambil daftar peminjaman
        $peminjamans = Peminjaman::all();

        // Ambil daftar mobil yang tersedia
        $availableMobils = Mobil::whereNotIn('id', Peminjaman::pluck('mobil_id'))->get();

        return view('peminjaman.index', compact('peminjamans', 'availableMobils'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'mobil_id' => 'required|exists:mobils,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Cek ketersediaan mobil pada tanggal yang diminta
        $isAvailable = $this->checkAvailability($request->mobil_id, $request->start_date, $request->end_date);

        if (!$isAvailable) {
            return redirect('/peminjaman')->with('error', 'Mobil tidak tersedia pada tanggal yang diminta.');
        }

        // Simpan data peminjaman
        $peminjaman = new Peminjaman();
        $peminjaman->mobil_id = $request->mobil_id;
        $peminjaman->tanggal_mulai = $request->start_date;
        $peminjaman->tanggal_selesai = $request->end_date;
        $peminjaman->save();

        return redirect('/peminjaman')->with('success', 'Pemesanan berhasil!');
    }

    // Metode lain yang mungkin Anda perlukan...

    // Metode untuk memeriksa ketersediaan mobil pada tanggal yang diminta
    private function checkAvailability($mobilId, $startDate, $endDate)
    {
        $existingPeminjaman = Peminjaman::where('mobil_id', $mobilId)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal_mulai', [$startDate, $endDate])
                    ->orWhereBetween('tanggal_selesai', [$startDate, $endDate]);
            })
            ->exists();

        return !$existingPeminjaman;
    }
}