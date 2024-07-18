<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = BarangKeluar::with('barang')->get();
        return view('barang_keluar.index', compact('barangKeluars'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang_keluar.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer',
            'tgl_transaksi' => 'required|date',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($barang->jumlah_stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak mencukupi.');
        }

        BarangKeluar::create($request->all());
        $barang->decrement('jumlah_stok', $request->jumlah);

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil ditambahkan.');
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        $barang = $barangKeluar->barang;
        $barang->increment('jumlah_stok', $barangKeluar->jumlah);
        $barangKeluar->delete();

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil dihapus.');
    }
}