<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatanppa extends Model
{
    use HasFactory;
    protected $table = 'kegiatanppas';
    protected $fillable = [
        'id',
        'judul_kegiatan',
        'tempat_pelaksanaan',
        'gambar_event',
        'keterangan_event',
        'tgl_mulai',
        'tgl_selesai',
        'jam_mulai',
        'jam_selesai',
        'calendar_id'
    ];
    protected $dates = ['tgl_mulai', 'tgl_selesai'];

    public function kegiatanabsen() {
        return $this->hasOne(absensikegiatan::class, 'id', 'kegiatan_id');
    }

    public function getCreatedAtAttribute($dates)
    {
        $date = Carbon::parse($dates);
        return $date->format('d-m-Y');
    }
}
