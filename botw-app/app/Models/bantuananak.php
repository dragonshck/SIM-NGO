<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bantuananak extends Model
{
    use HasFactory;
    protected $table = 'bantuananaks';

    protected $fillable = [
        'nama_bantuan',
        'amount_bantuan',
        'keterangan',
        'lampiran_bantuan',
        'ku_id',
        'status_trxbantuan'
    ];

    public function kelompokumurz()
    {
        return $this->belongsTo(kelompokumur::class, 'ku_id', 'id');
    }
}
