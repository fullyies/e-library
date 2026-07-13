<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [

        'kode_pinjam',

        'user_id',

        'tanggal_pinjam',

        'tanggal_kembali',

        'status'

    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Setiap peminjaman dimiliki oleh satu user (one to one relationship)
    }

    public function detailPeminjaman()
{
    return $this->hasMany(DetailPeminjaman::class); // Setiap peminjaman dapat memiliki banyak detail peminjaman (one to many relationship)
}
}
