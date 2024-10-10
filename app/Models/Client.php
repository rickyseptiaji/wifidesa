<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nama', 'alamat', 'telp','paket', 'tarif', 'tgl_aktivasi'];

    public function bills(){
        return $this->hasMany(Bill::class);
    }
}
