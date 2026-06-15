<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = ["kategori_id", "nama_tanaman", "tgl_tanam", "lokasi", "kondisi", "foto", "catatan"];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function events()
    {
        return $this->hasMany(Event::class, 'plant_id');
    }
}
