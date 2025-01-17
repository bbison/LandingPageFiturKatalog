<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media_produk extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function produk()
    {
        return $this->belongsTo(produk::class);
    }
}
