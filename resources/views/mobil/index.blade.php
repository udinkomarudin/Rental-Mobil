<!-- resources/views/mobil/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="mobil-list-container">
        <h1>Manajemen Mobil</h1>

        <div class="mobil-list">
            @foreach($mobils as $mobil)
                <div class="mobil-card">
                    <h3>{{ $mobil->merek }} - {{ $mobil->model }}</h3>
                    <p>Nomor Plat: {{ $mobil->nomor_plat }}</p>
                    <p>Tarif Sewa: {{ $mobil->tarif_sewa }}</p>
                    <button class="btn-detail">Lihat Detail</button>
                </div>
            @endforeach
        </div>

        <a href="{{ url('/mobil/create') }}" class="btn-tambah-mobil">Tambah Mobil</a>
    </div>
@endsection

<style>
    /* Tambahan CSS khusus untuk halaman ini */
    .mobil-list-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .mobil-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .mobil-card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin: 10px;
        padding: 15px;
        width: 300px;
    }

    .btn-detail {
        background-color: #3498db;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-tambah-mobil {
        display: block;
        background-color: #2ecc71;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        margin-top: 20px;
    }

    .btn-tambah-mobil:hover,
    .btn-detail:hover {
        background-color: #1d7eaa;
    }
</style>


