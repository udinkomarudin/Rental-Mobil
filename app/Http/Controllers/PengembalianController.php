<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = Pengembalian::all();
        return view('pengembalian.index', compact('pengembalians'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nomor_plat' => 'required|exists:peminjamen,nomor_plat',
        ]);

        // Ambil data peminjaman berdasarkan nomor plat
        $peminjaman = Peminjaman::where('nomor_plat', $request->nomor_plat)->first();

        if (!$peminjaman) {
            return redirect('/pengembalian')->with('error', 'Mobil tidak ditemukan dalam daftar peminjaman.');
        }

        // Hitung jumlah hari penyewaan
        $start_date = Carbon::parse($peminjaman->tanggal_mulai);
        $end_date = Carbon::parse($peminjaman->tanggal_selesai);
        $jumlah_hari = $end_date->diffInDays($start_date) + 1; // Jumlah hari inklusif

        // Hitung biaya sewa
        $biaya_sewa = $jumlah_hari * $peminjaman->mobil->tarif_sewa;

        // Simpan data pengembalian
        $pengembalian = new Pengembalian();
        $pengembalian->peminjaman_id = $peminjaman->id;
        $pengembalian->nomor_plat = $request->nomor_plat;
        $pengembalian->jumlah_hari = $jumlah_hari;
        $pengembalian->biaya_sewa = $biaya_sewa;
        $pengembalian->save();

        // Redirect dengan pesan sukses
        return redirect('/pengembalian')->with('success', 'Pengembalian berhasil! Biaya sewa: ' . $biaya_sewa);
    }
}
