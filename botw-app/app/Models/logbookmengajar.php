<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logbookmengajar extends Model
{
    use HasFactory;
    protected $table = 'logbookmengajars';
    protected $fillable = [
        'judul_logbook',
        'isi_logbook',
        'staff_id',
        'lampiran_kegiatan'
    ];

    public function logbooktutor()
    {
        return $this->belongsTo(StaffPPA::class, 'staff_id', 'id');
    }
}
