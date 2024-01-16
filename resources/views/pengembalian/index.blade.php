<!-- resources/views/pengembalian/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="pengembalian-container">
        <h1>Data Pengembalian Mobil</h1>

        <!-- Formulir Pengembalian Mobil -->
        <div class="pengembalian-form">
            
            <form action="{{ url('/pengembalian') }}" method="post">
                @csrf
                <!-- Nomor Plat Mobil -->
                <div class="form-group">
                    <label for="nomor_plat">Nomor Plat Mobil:</label>
                    <input type="text" name="nomor_plat" id="nomor_plat" required>
                </div>
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-success">Kembalikan Mobil</button>
            </form>
        </div>

        <!-- Daftar Pengembalian -->
        <div class="pengembalian-list">
            <h2>Riwayat Pengembalian</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Pengembalian</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Nomor Plat Mobil</th>
                        <th>Jumlah Hari</th>
                        <th>Biaya Sewa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengembalians as $pengembalian)
                        <tr>
                            <td>{{ $pengembalian->id }}</td>
                            <td>{{ $pengembalian->created_at }}</td>
                            <td>{{ $pengembalian->nomor_plat }}</td>
                            <td>{{ $pengembalian->jumlah_hari }}</td>
                            <td>{{ $pengembalian->biaya_sewa }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
