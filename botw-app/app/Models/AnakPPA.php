<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakPPA extends Model
{
    use HasFactory;

    protected $table = 'anakppa';

    protected $fillable = [
        'phone',
        'current_addr',
        'perm_addr',
        'dateob',
        'anak_id',
        'kelompok_umur_id',
        'sponsor_anak_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sponsor()
    {
        return $this->belongsTo(SponsorAnak::class, 'sponsor_anak_id', 'id');
    }

    public function kelompokumur()
    {
        return $this->belongsTo(KelompokUmur::class, 'kelompok_umur_id', 'id');
    }

    public function attendances()
    {
        return $this->hasMany(AbsensiAnak::class);
    }
}
