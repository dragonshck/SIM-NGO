<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorAnak extends Model
{
    use HasFactory;

    public function sponsoranak()
    {
        return $this->hasMany(AnakPPA::class, 'sponsor_anak_id');
    }
}
