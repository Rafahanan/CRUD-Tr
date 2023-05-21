<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';

    protected $fillable = [
        'transaksi_id',
        'barang_id',
        'serial_no',
        'price',
        'discount',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function nomor_seri()
    {
        return $this->belongsTo(NomorSeri::class, 'serial_no');
    }
    
    use HasFactory;




    public function getTotalHargaAttribute()
    {
        return ($this->price - $this->discount) * $this->qty;
    }
}