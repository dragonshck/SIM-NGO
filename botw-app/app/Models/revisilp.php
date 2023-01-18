<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class revisilp extends Model
{
    use HasFactory;
    protected $table = 'revisilps';
    protected $fillable = [
        'keterangan_revisi',
        'mentor_id',
        'lp_id'
    ];

    public function revisi()
    {
        return $this->belongsTo(lessonplan::class, 'lp_id', 'id');
    }
}
