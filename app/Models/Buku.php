<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'kategori_id',
        'kode_buku',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class); // Relasi many-to-one dengan model Kategori
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class); // Relasi one-to-many dengan model DetailPeminjaman
    }
}