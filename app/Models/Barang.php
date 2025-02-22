<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'jumlah_stok', 'jenis_barang'];

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}