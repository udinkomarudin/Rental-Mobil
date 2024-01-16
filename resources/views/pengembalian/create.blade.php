<!-- resources/views/pengembalian/create.blade.php -->

<h1>Pengembalian Mobil</h1>

<form method="post" action="{{ url('/pengembalian') }}">
    @csrf
    <input type="hidden" name="peminjaman_id" value="{{ $peminjaman->id }}">

    <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
    <input type="date" name="tanggal_pengembalian" required>

    <button type="submit">Kembalikan Mobil</button>
</form>
