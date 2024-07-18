@extends('layouts.app')

@section('content')
    <h1>{{ isset($barang) ? 'Edit Barang' : 'Tambah Barang' }}</h1>
    <form action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.store') }}" method="POST">
        @csrf
        @if(isset($barang))
            @method('PUT')
        @endif
        <div>
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" name="nama_barang" value="{{ $barang->nama_barang ?? old('nama_barang') }}" required>
        </div>
        <div>
            <label for="jumlah_stok">Jumlah Stok:</label>
            <input type="number" name="jumlah_stok" value="{{ $barang->jumlah_stok ?? old('jumlah_stok') }}" required>
        </div>
        <div>
            <label for="jenis_barang">Jenis Barang:</label>
            <input type="text" name="jenis_barang" value="{{ $barang->jenis_barang ?? old('jenis_barang') }}" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection