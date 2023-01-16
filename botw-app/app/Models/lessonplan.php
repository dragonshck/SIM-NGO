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
        return  $this->belongsTo(TutorAnak::class, 'tutor_id', 'id');
    }
}
