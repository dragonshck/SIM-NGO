<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorAnak extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fotoprofil',
        'fotocover',
        'phone',
        'dateofbirth',
        'current_address',
        'permanent_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelompokumur()
    {
        return $this->hasMany(KelompokUmur::class);
    }

    public function anaks()
    {
        return $this->classes()->withCount('anaks');
    }
}
