<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LemburStaf extends Model
{
    use HasFactory;

    protected $fillable = [
        'jabatan_id',
        'nominal_lembur'
    ];

    public function lemburjabatan()
    {
        return $this->hasOne(JabatanStaff::class);
    }
}
