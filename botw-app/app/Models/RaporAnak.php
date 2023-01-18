<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaporAnak extends Model
{
    use HasFactory;
    protected $table = 'rapor_anaks';
    protected $fillable = [
        'keterangan_rapor',
        'avg_nilai',
        'lampiran_rapor',
        'anak_id'
    ];

    public function anak2rapor()
    {
        return $this->belongsTo(AnakPPA::class, 'anak_id', 'id');
    }
}
