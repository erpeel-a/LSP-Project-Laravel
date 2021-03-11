<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'jenis_kelamin',
        'alamat',
        'tempat_lahir',
        'tgl_lahir',
        'gaji_id',
        'status'
    ];

    public function golongan()
    {
        return $this->belongsTo(Gaji::class, 'gaji_id');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
