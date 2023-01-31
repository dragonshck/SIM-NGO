<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensikegiatan extends Model
{
    use HasFactory;
    protected $table = 'absensikegiatans';
    protected $fillable = [
        'kegiatan_id',
        'anak_id',
        'status_absen',
        'tanggal_absen',
        'periode'
    ];

    public function kegiatananak() {
        return $this->belongsTo(AnakPPA::class, 'anak_id', 'id');
    }

    public function kodeabsenkegiatan()
    {
        return $this->belongsTo(kodeabsensi::class, 'status_absen', 'id');
    }
}
