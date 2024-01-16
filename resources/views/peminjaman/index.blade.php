<!-- resources/views/peminjaman/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="peminjaman-container">
        <h1>Pesan Mobil</h1>

        <!-- Formulir Pemesanan Mobil -->
        <div class="peminjaman-form">
            
            <form action="{{ url('/peminjaman') }}" method="post">
                @csrf
                <!-- Pilih Mobil -->
                <div class="form-group">
                    <label for="mobil_id">Pilih Mobil:</label>
                    <select name="mobil_id" id="mobil_id" required>
                        @foreach($availableMobils as $mobil)
                            <option value="{{ $mobil->id }}">{{ $mobil->brand }} - {{ $mobil->model }} ({{ $mobil->plate_number }})</option>
                        @endforeach
                    </select>
                </div>
                <!-- Tanggal Mulai -->
                <div class="form-group">
                    <label for="start_date">Tanggal Mulai:</label>
                    <input type="date" name="start_date" id="start_date" required>
                </div>
                <!-- Tanggal Selesai -->
                <div class="form-group">
                    <label for="end_date">Tanggal Selesai:</label>
                    <input type="date" name="end_date" id="end_date" required>
                </div>
                <!-- Tombol Submit -->
                <button type="submit">Pesan Sekarang</button>
            </form>
        </div>

        <!-- Daftar Peminjaman -->
        <div class="peminjaman-list">
            <h2>Riwayat Peminjaman</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Peminjaman</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Nomor Plat Mobil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjamans as $peminjaman)
                        <tr>
                            <td>{{ $peminjaman->id }}</td>
                            <td>{{ $peminjaman->tanggal_mulai }}</td>
                            <td>{{ $peminjaman->tanggal_selesai }}</td>
                            <td>{{ $peminjaman->mobil->plate_number }}</td>
                            <td>
                                <a href="{{ url('/peminjaman/'.$peminjaman->id.'/detail') }}" class="btn-detail">Lihat Detail</a>
                                <a href="{{ url('/peminjaman/'.$peminjaman->id.'/edit') }}" class="btn-edit">Edit</a>
                                <form action="{{ url('/peminjaman/'.$peminjaman->id) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
