<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tanggal_tranksaksi',
        'total_pengeluaran',
        'metode_pembayaran',
        'catatan',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
