<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatanppa extends Model
{
    use HasFactory;
    protected $table = 'kegiatanppas';
    protected $fillable = [
        'judul_kegiatan',
        'tempat_pelaksanaan',
        'gambar_event',
        'keterangan_event',
        'tgl_mulai',
        'tgl_selesai',
        'jam_mulai',
        'jam_selesai',
        'tipe_kegiatan',
        'ku_id'
    ];

    public function kegiatan2ku()
    {
        return $this->belongsTo(KelompokUmur::class, 'ku_id', 'id');
    }
}
