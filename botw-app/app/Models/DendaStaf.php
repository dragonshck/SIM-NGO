<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DendaStaf extends Model
{
    use HasFactory;

    protected $fillable = [
        'jabatan_id',
        'nominal_denda'
    ];

    public function dendajabatan()
    {
        return $this->hasOne(JabatanStaff::class);
    }
}
