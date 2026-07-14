<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {

        Buku::create([
            'kode_buku' => 'BK0001',
            'kategori_id'=>1,
            'judul'=>'Laravel 13 Dasar',
            'penulis'=>'Budi Santoso',
            'penerbit'=>'Informatika',
            'tahun_terbit'=>2025,
            'stok'=>10
        ]);

        Buku::create([
            'kode_buku' => 'BK0002',
            'kategori_id'=>1,
            'judul'=>'Pemrograman PHP Modern',
            'penulis'=>'Andi Wijaya',
            'penerbit'=>'Gramedia',
            'tahun_terbit'=>2024,
            'stok'=>7
        ]);

        Buku::create([
            'kode_buku' => 'BK0003',
            'kategori_id'=>2,
            'judul'=>'Laskar Pelangi',
            'penulis'=>'Andrea Hirata',
            'penerbit'=>'Bentang',
            'tahun_terbit'=>2005,
            'stok'=>15
        ]);

    }
}