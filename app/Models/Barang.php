<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'product_name',
        'brand',
        'price',
        'model_no',
    ];

    protected $attributes = [
        'product_name' => 'Barang',
    ];

    public function nomor_seri()
    {
        return $this->hasMany(NomorSeri::class);
    }

    use HasFactory;
}
