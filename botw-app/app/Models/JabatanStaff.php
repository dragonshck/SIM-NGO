<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanStaff extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jabatan',
        'gaji_pokok',
        'tunjangan_kendaraan',
        'tunjangan_makanan'
    ];

    public function staff()
    {
        return $this->hasMany(StaffPPA::class);
    }
}
