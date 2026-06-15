<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ["plant_id", "tipe_event", "tgl_event", "lokasi", "keterangan"];
    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }
}
