<!-- resources/views/peminjaman/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="peminjaman-container">
        <h1>Peminjaman Mobil</h1>

        <form method="post" action="{{ url('/peminjaman') }}">
            @csrf

            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai:</label>
                <input type="date" name="tanggal_mulai" required>
            </div>

            <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai:</label>
                <input type="date" name="tanggal_selesai" required>
            </div>

            <div class="form-group">
                <label for="nomor_plat">Nomor Plat Mobil:</label>
                <input type="text" name="nomor_plat" required>
            </div>

            <button type="submit" class="btn-pinjam">Pinjam Mobil</button>
        </form>
    </div>
@endsection

<style>
    /* Tambahan CSS khusus untuk halaman ini */
    .peminjaman-container {
        max-width: 600px;
        margin: 0 auto;
        overflow-y: auto; /* Tambahkan properti ini untuk membuat scroll jika konten melebihi container */
        max-height: 500px; /* Sesuaikan tinggi container sesuai dengan kebutuhan Anda */
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    .btn-pinjam {
        background-color: #3498db;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-pinjam:hover {
        background-color: #2980b9;
    }
</style>
