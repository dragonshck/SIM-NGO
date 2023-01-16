<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffPPA extends Model
{
    use HasFactory;

    protected $table = 'staff_p_p_a_s';
    protected $fillable = [
        'user_id',
        'phone',
        'dateofbirth',
        'current_addr',
        'perm_addr',
        'jabatan_staff_id',
        'kelompok_umur_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(JabatanStaff::class, 'jabatan_staff_id', 'id');
    }

    public function gaji()
    {
        return $this->hasMany(Penggajian::class);
    }

    public function absen()
    {
        return $this->hasMany(AbsensiStaff::class);
    }

    public function cuti()
    {
        return $this->hasMany(cutistaff::class);
    }
}
