<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'karyawan_id',
        'transport',
        'lembur',
        'gaji_total'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
