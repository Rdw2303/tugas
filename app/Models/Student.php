<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    //tambahkan kode berikut
    protected $fillable = [
        'id_pelanggan', 
        'nama_pelanggan',
        'no_telepon',
        'alamat',
        'no_ktp'
    ];
} 