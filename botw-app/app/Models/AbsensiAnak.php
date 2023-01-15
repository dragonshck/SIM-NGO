<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiAnak extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelompok_umur_id',
        'tutor_anak_id',
        'anak_p_p_a_id',
        'attendence_date',
        'attendence_status'
    ];

    public function anakabsen()
    {
        return $this->belongsTo(AnakPPA::class, 'anak_p_p_a_id', 'id');
    }

    public function tutorngabsen()
    {
        return $this->belongsTo(TutorAnak::class, 'tutor_anak_id', 'id');
    }

    public function kelompokumurabsen()
    {
        return $this->belongsTo(KelompokUmur::class, 'kelompok_umur_id', 'id');
    }
}
