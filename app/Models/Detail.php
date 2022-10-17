<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_data',
        'id_transaksi',
        'id_barang',
        'jml',
        'total'
    ];
    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }
    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
