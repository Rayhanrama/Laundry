<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksis";
    protected $primaryKey = "id";
    protected $fillable = [
        'tanggal','pembayaran','nama','telp','berat','id_jenis','status','total',
    ];

    public function jenis()  {
        return $this->belongsTo(Jenis::class, 'id_jenis');
    }
}
