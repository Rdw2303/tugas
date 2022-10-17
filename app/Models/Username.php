<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Username extends Model
{
    use HasFactory;
    protected $table = 'usernames';
    protected $fillable=[
        'id_user',
        'nama',
        'username',
        'password',
        'akses'
    ];
    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
