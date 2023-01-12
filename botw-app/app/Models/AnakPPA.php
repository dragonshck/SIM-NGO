<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakPPA extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fotoprofil',
        'fotocover',
        'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sponsor()
    {
        return $this->belongsTo(SponsorAnak::class);
    }

    public function kelompokumur()
    {
        return $this->belongsTo(KelompokUmur::class, 'kelompok_umur_id');
    }

    public function attendances()
    {
        return $this->hasMany(AbsensiAnak::class);
    }
}
