<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    use HasFactory;

    protected $table = 'recursos';
    public $timestamps = false;


    public function incidencies()
    {
        return $this->hasMany(Incidencies::class, 'incidencies_has_recursos', 'recursos_id', 'incidencies_id')->withPivot('hora_activacio', 'hora_mobilitzacio', 'hora_assistencia', 'hora_transport', 'hora_arribada_hospital', 'hora_transferencia', 'hora_finalitzacio', 'prioritat', 'desti');
    }

    public function tipos_recursos()
    {
        return $this->belongsToMany(TipusRecursos::class, 'tipus_recursos_id');
    }

    public function usuaris()
    {
        return $this->hasMany(Usuaris::class, 'recursos_id');
    }
}
