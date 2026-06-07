<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;
use App\Models\Produk;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    protected $primaryKey = 'detail_id';

    protected $fillable = [
        'transaksi_id',
        'produk_id',
        'jumlah_barang',
        'harga_satuan',
        'subtotal'
    ];

    public function transaksi()
    {
        return $this->belongsTo(
            Transaksi::class,
            'transaksi_id',
            'transaksi_id'
        );
    }

    public function produk()
    {
        return $this->belongsTo(
            Produk::class,
            'produk_id',
            'produk_id'
        );
    }
}
