<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rewardsanak extends Model
{
    use HasFactory;
    protected $table = 'rewardsanaks';
    protected $fillable = [
        'nama_reward',
        'amount_reward',
        'lampiran_reward',
        'tipe_reward',
        'status_reward',
        'anak_id',
        'keterangan_reward'
    ];

    public function rewardsanak()
    {
        return $this->belongsTo(AnakPPA::class, 'anak_id', 'id');
    }
}
