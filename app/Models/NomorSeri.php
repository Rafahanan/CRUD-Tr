<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorSeri extends Model
{
    protected $table = 'nomor_seri';

    protected $fillable = [
        'barang_id',
        'serial_no',
        'price',
        'prod_date',
        'warranty_start',
        'warranty_duration',
        'used',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
    
    use HasFactory;



    
}

