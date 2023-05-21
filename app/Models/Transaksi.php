<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
     protected $table = 'transaksi';

    protected $fillable = [
        'tanggal',
        'no_trans',
        'customer',
        'tipe_trans',
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
    
    use HasFactory;
}
