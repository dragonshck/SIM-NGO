<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hadiahsponsor extends Model
{
    use HasFactory;
    protected $table = 'hadiahsponsors';
    protected $fillable = [
        'nama_hadiah',
        'keterangan_hadiah',
        'amount_hadiah',
        'lampiran_hadiah',
        'anak_id',
        'status_hadiah'
    ];

    public function hadiahanak()
    {
        return $this->belongsTo(AnakPPA::class, 'anak_id', 'id');
    }
}
