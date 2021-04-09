<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencies extends Model
{
    use HasFactory;

    protected $table = 'incidencies';
    public $timestamps = false;

    public function afectats()
    {
        return $this->hasMany(Afectats::class, 'incidencies_has_afectats', 'incidencies_id', 'afectats_id');
    }

    public function tipus_incidencies()
    {
        return $this->belongsTo(TipusIncidencies::class, 'tipus_incidencies_id');
    }

    public function alertants()
    {
        return $this->belongsTo(Alertants::class, 'alertants_id');
    }

    public function municipis()
    {
        return $this->belongsTo(Municipis::class, 'municipis_id');
    }

    public function recursos()
    {
        return $this->hasMany(Recursos::class, 'incidencies_has_recursos', 'incidencies_id', 'recursos_id')->withPivot('hora_activacio', 'hora_mobilitzacio', 'hora_assistencia', 'hora_transport', 'hora_arribada_hospital', 'hora_transferencia', 'hora_finalitzacio', 'prioritat', 'desti');
    }

    public function usuari()
    {
        return $this->belongsToMany(Usuaris::class, 'usuaris_id');
    }
}
