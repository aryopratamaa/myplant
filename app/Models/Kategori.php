<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ["nama", "deskripsi"];
    public function plants()
    {
        return $this->hasMany(Plant::class, 'kategori_id');
    }
}
