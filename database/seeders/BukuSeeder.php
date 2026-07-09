<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {

        Buku::create([
            'kategori_id'=>1,
            'judul'=>'Laravel 13 Dasar',
            'penulis'=>'Budi Santoso',
            'penerbit'=>'Informatika',
            'tahun_terbit'=>2025,
            'isbn'=>'9781111111111',
            'stok'=>10,
            'cover'=>null
        ]);

        Buku::create([
            'kategori_id'=>1,
            'judul'=>'Pemrograman PHP Modern',
            'penulis'=>'Andi Wijaya',
            'penerbit'=>'Gramedia',
            'tahun_terbit'=>2024,
            'isbn'=>'9782222222222',
            'stok'=>7,
            'cover'=>null
        ]);

        Buku::create([
            'kategori_id'=>2,
            'judul'=>'Laskar Pelangi',
            'penulis'=>'Andrea Hirata',
            'penerbit'=>'Bentang',
            'tahun_terbit'=>2005,
            'isbn'=>'9783333333333',
            'stok'=>15,
            'cover'=>null
        ]);

    }
}