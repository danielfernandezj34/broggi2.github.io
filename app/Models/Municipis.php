<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipis extends Model
{
    use HasFactory;

    protected $table = 'municipis';
    public $timestamps = false;


    public function alertants()
    {
        return $this->hasMany(Alertants::class, 'municipis_id');
    }

    public function comarques()
    {
        return $this->belongsTo(Comarques::class, 'comarques_id');
    }

    public function incidencies()
    {
        return $this->hasMany(Incidencies::class, 'municipis_id');
    }
}
