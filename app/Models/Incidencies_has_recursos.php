<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencies_has_recursos extends Model
{
    use HasFactory;

    protected $table = 'incidencies_has_recursos';
    protected $primaryKey = ['incidencies_id', 'recursos_id'];
    public $incrementing = false;
    public $timestamps = false;

    public function incidencies()
    {
        return $this->belongsTo(Incidencies::class, 'incidencies_id');
    }

    public function recursos()
    {
        return $this->belongsTo(Recursos::class, 'recursos_id');
    }
}
