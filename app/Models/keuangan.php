<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keuangan extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function pesanan()
    {
        return $this->hasOne(pesanan::class);
    }
}
