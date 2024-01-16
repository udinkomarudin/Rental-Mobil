<!-- resources/views/mobil/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="tambah-mobil-container">
        <h1>Tambah Mobil</h1>

        <form method="post" action="{{ url('/mobil') }}">
            @csrf

            <div class="form-group">
                <label for="merek">Merek:</label>
                <input type="text" name="merek" required>
            </div>

            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" name="model" required>
            </div>

            <div class="form-group">
                <label for="nomor_plat">Nomor Plat:</label>
                <input type="text" name="nomor_plat" required>
            </div>

            <div class="form-group">
                <label for="tarif_sewa">Tarif Sewa:</label>
                <input type="number" name="tarif_sewa" required>
            </div>

            <button type="submit" class="btn-simpan">Simpan</button>
        </form>
    </div>
@endsection

<style>
    /* Tambahan CSS khusus untuk halaman ini */
    .tambah-mobil-container {
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

    .btn-simpan {
        background-color: #3498db;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-simpan:hover {
        background-color: #2980b9;
    }
</style>
