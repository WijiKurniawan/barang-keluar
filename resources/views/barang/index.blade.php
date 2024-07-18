@extends('layouts.app')

@section('content')
    <h1>Daftar Barang</h1>
    <a href="{{ route('barang.create') }}">Tambah Barang</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Jumlah Stok</th>
                <th>Jenis Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $barang)
            <tr>
                <td>{{ $barang->id }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->jumlah_stok }}</td>
                <td>{{ $barang->jenis_barang }}</td>
                <td>
                    <a href="{{ route('barang.edit', $barang->id) }}">Edit</a>
                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
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