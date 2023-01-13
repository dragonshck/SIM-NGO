<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kodeabsensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_absen',
        'nama_absen',
        'keterangan'
    ];
}
