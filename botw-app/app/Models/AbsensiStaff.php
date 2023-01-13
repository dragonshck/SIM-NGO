<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiStaff extends Model
{
    use HasFactory;

    protected $table = 'absensi_staff';
    protected $fillable = [
        'staff_p_p_a_id',
        'status_absen',
        'tanggal_absen',
        'periode'
    ];

    public function absen2staff()
    {
        return $this->belongsTo(StaffPPA::class, 'staff_p_p_a_id', 'id');
    }

    public function _staff()
    {
        return $this->hasOne(StaffPPA::class, 'id', 'staff_p_p_a_id');
    }
}
