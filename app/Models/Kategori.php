<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori'
    ];

    // Relasi
    public function buku()
    {
        return $this->hasMany(Buku::class); // Relasi one-to-many dengan model Buku
    }
}
// 1 kategori memiliki banyak buku (one to many relationship)