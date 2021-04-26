<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    use HasFactory;

    protected $table = 'recursos';
    public $timestamps = false;

    public function tipos_recursos()
    {
        return $this->belongsToMany(TipusRecursos::class, 'tipus_recursos_id');
    }

    public function usuaris()
    {
        return $this->hasMany(Usuaris::class, 'recursos_id');
    }

    public function incidencies_has_recursos()
    {
        return $this->hasMany(Incidencies_has_recursos::class, 'recursos_id');
    }
}
