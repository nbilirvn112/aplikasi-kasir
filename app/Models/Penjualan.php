<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'diskon',
        'bayar',
        'kembali',
        'id_user',
        'status',

    ];

        public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }
    public function user()
    {
        return $this->belongsTo(Pelanggan::class, 'id_user', 'id');
    }
    
}
