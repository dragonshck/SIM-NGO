<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokUmur extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_name',
        'tutor_anak_id',
        'class_description'
    ];

    public function tutor()
    {
        return $this->belongsTo(TutorAnak::class);
    }

    public function anakku()
    {
        return $this->hasMany(AnakPPA::class, 'kelompok_umur_id');
    }
}
