@extends('layouts.app')

@section('content')
    <h1>Daftar Barang Keluar</h1>
    <a href="{{ route('barang-keluar.create') }}">Tambah Barang Keluar</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Transaksi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangKeluars as $barangKeluar)
            <tr>
                <td>{{ $barangKeluar->id }}</td>
                <td>{{ $barangKeluar->barang->nama_barang }}</td>
                <td>{{ $barangKeluar->barang->jenis_barang }}</td>
                <td>{{ $barangKeluar->jumlah }}</td>
                <td>{{ $barangKeluar->tgl_transaksi }}</td>
                <td>
                    <form action="{{ route('barang-keluar.destroy', $barangKeluar->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection