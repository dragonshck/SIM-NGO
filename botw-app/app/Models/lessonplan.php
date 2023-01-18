<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lessonplan extends Model
{
    use HasFactory;
    protected $table = 'lessonplans';
    protected $fillable = [
        'judul_lp',
        'isi_lp',
        'lampiran_lp',
        'status_lp',
        'tutor_id'
    ];

    public function lptutor()
    {
        return  $this->belongsTo(StaffPPA::class, 'tutor_id', 'id');
    }

    public function revisilp() {
        return $this->hasOne(revisilp::class);
    }
}
