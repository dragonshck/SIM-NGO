<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokUmur extends Model
{
    use HasFactory;
    protected $table = 'kelompok_umur';
    protected $fillable = [
        'ku_name',
        'ku_description'
    ];

    public function tutor()
    {
        return $this->belongsTo(StaffPPA::class, 'kelompok_umur_id', 'id');
    }

    public function anakku()
    {
        return $this->hasMany(AnakPPA::class);
    }

    public function bantuan()
    {
        return $this->hasMany(bantuananak::class);
    }
}
