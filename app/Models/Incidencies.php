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
        return $this->belongsToMany(Afectats::class, 'incidencies_has_afectats', 'incidencies_id', 'afectats_id');
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

    public function usuari()
    {
        return $this->hasMany(Usuaris::class, 'usuaris_id');
    }

    public function incidencies_has_recursos()
    {
        return $this->hasMany(Incidencies_has_recursos::class, 'incidencies_id');
    }

    public function scopeFiltrePerUsuarisId($query, $filtreUsuarisFiltre){
        if(count($filtreUsuarisFiltre) != 0){
            foreach($filtreUsuarisFiltre as $filtreUsuariFiltre){
                $query->where('usuaris_id','=', $filtreUsuariFiltre);
            }
        }
    }
}
