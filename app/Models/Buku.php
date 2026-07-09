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

        'judul',

        'penulis',

        'penerbit',

        'tahun_terbit',

        'isbn',

        'stok',

        'cover'

    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }
}