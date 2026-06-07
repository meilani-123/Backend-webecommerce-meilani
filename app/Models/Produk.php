<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailTransaksi;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $primaryKey = 'produk_id';

    protected $fillable = [
        'nama_produk',
        'merk',
        'deskripsi',
        'harga',
        'stok',
        'gambar'
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(
            DetailTransaksi::class,
            'produk_id',
            'produk_id'
        );
    }
}
