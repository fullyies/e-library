<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman';

    protected $fillable = [
        'peminjaman_id',
        'buku_id',
        'jumlah',
    ];

    public function peminjaman()
{
    return $this->belongsTo(Peminjaman::class); // Relasi many-to-one dengan model Peminjaman
}

    public function buku()
    {
        return $this->belongsTo(Buku::class); // Relasi many-to-one dengan model Buku
    }

    
}