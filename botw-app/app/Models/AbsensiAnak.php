<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiAnak extends Model
{
    use HasFactory;

    protected $table = 'absensi_anak';
    protected $fillable = [
        'anak_p_p_a_id',
        'tanggal_absen',
        'status_absen',
        'periode'
    ];

    public function anakabsen()
    {
        return $this->belongsTo(AnakPPA::class, 'anak_p_p_a_id', 'id');
    }

    public function kodeabsen()
    {
        return $this->belongsTo(kodeabsensi::class, 'status_absen', 'id');
    }

    public function _anak()
    {
        return $this->hasOne('App\Models\AnakPPA', 'id', 'anak_p_p_a_id');
    }
}
