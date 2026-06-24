<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
        Produk::create([
            'nama_produk' => 'Facial Wash',
            'merk' => 'Wardah',
            'deskripsi' => 'Pembersih wajah untuk kulit normal',
            'harga' => 35000,
            'stok' => 50,
            'gambar' => 'wardah-facial-wash.jpg'
        ]);

        Produk::create([
            'nama_produk' => 'Serum Brightening',
            'merk' => 'Somethinc',
            'deskripsi' => 'Serum mencerahkan wajah',
            'harga' => 85000,
            'stok' => 30,
            'gambar' => 'somethinc-serum.jpg'
        ]);

        Produk::create([
            'nama_produk' => 'Moisturizer',
            'merk' => 'Azarine',
            'deskripsi' => 'Pelembab wajah harian',
            'harga' => 45000,
            'stok' => 40,
            'gambar' => 'azarine-moisturizer.jpg'
        ]);
    }
    }
