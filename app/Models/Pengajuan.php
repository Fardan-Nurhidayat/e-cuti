<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jeniscuti_id',
    'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cuti()
    {
        return $this->belongsTo(JenisCuti::class, 'jeniscuti_id');
    }

}
