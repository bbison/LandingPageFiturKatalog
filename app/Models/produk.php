<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function media()
    {
        return $this->hasMany(media_produk::class);
    }
    public function kategory()
    {
        return $this->belongsTo(kategory::class);
    }
    public function thumbnail() {
        return $this->hasMany(media_produk::class)->orderBy('updated_at','ASC')->first();
    }
    function terjual() {
        
    }
    function pesanan()  {
        return $this->hasMany(pesanan::class);
    }

    public function scopeKategory($query, $kategory)
    {
        if(!$kategory){
            return $query;
        }
        $kategory_id = kategory::firstWhere('name', 'like','%'.$kategory.'%')->id;
        return $query->where('kategory_id', $kategory_id);
    }
    public function scopeParam($query, $param)
    {
        if(!$param){
            return $query;
        }
        return $query->where('nama', 'like','%'.$param.'%')
        ->orWhere('keterangan', 'like','%'.$param.'%');
    }
}
