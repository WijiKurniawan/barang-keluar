@extends('layouts.app')

@section('content')
    <h1>Tambah Barang Keluar</h1>
    <form action="{{ route('barang-keluar.store') }}" method="POST">
        @csrf
        <div>
            <label for="barang_id">Pilih Barang:</label>
            <select name="barang_id" required>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }} (Stok: {{ $barang->jumlah_stok }})</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" required>
        </div>
        <div>
            <label for="tgl_transaksi">Tanggal Transaksi:</label>
            <input type="date" name="tgl_transaksi" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection