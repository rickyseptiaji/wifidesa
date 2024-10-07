<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
   protected $fillable = ['client_id','tgl_tagihan', 'tgl_pembayaran','pembayaran'];
   public function client()
   {
    return $this->belongsTo(Client::class);
   }
}
