<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LazTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama_pembayaran', 'nama_barang', 'sku_barang', 'jumlah_pembayaran', 'pernyataan', 'nomor_order', 'referensi'
    ];
}
