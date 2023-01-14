<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorAnak extends Model
{
    use HasFactory;

    protected $table = 'tutor';
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
        return $this->belongsTo(User::class, 'tutor_id', 'id');
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
