<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table='transaksis';
    protected $fillable=[
        'id_transaksi',
        'tgl_trx',
        'id_user',
        'total_bayar',
        'bayar'
    ];
    public function username(){
        return $this->belongsTo(Username::class);
    }
    public function detail(){
        return $this->hasMany(Detail::class);
    }
    public function getAutoNumberOptions()
            {
                return [
                    'id_barang' => [
                        'format' => 'Trs?', // Format kode yang akan digunakan.
                        'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
                    ]
                ];
            }
}
