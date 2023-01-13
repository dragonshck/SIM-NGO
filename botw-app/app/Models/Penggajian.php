<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;
    protected $table = 'penggajians';
    protected $fillable = [
        'staff_p_p_a_id',
        'uang_overtime',
        'jumlah_overtime',
        'tgl_salary',
        'periode',
        'total',
    ];

    public function staff()
    {
        return $this->belongsTo(StaffPPA::class, 'staff_p_p_a_id', 'id');
    }
}
