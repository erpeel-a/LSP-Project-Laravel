<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $fillable = [
        'golongan',
        'gaji_pokok',
        'tunjangan'
    ];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
