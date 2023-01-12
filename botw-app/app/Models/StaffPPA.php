<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffPPA extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fotoprofil',
        'fotocover'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
