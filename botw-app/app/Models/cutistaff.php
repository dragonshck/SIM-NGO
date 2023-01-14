<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cutistaff extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'tgl_mulai',
        'tgl_selesai',
        'gambar_bukti',
        'keterangan'
    ];


    public function cuti2staff()
    {
        return $this->belongsTo(StaffPPA::class, 'staff_id', 'id');
    }
}
