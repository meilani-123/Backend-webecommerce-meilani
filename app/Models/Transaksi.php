<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DetailTransaksi;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $primaryKey = 'transaksi_id';

    protected $fillable = [
        'user_id',
        'tanggal_transaksi',
        'total_harga',
        'metode_pembayaran',
        'status_pesanan',
        'alamat_pengiriman'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(
            DetailTransaksi::class,
            'transaksi_id',
            'transaksi_id'
        );
    }
}
