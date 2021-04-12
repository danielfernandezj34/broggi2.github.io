<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuaris extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuaris';
    public $timestamps = false;

    public function incidencies()
    {
        return $this->hasMany(Incidencies::class, 'usuaris_id');
    }

    public function recursos()
    {
        return $this->belongsToMany(Recursos::class, 'recursos_id');
    }

    public function rols()
    {
        return $this->belongsToMany(Rols::class, 'rols_id');
    }
}
