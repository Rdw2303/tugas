<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_barang',
        'nama_barang',
        'warna',
        'harga',
        'stok'
    ];
    public function detail(){
        return $this->hasMany(Detail::class);
    }
}
