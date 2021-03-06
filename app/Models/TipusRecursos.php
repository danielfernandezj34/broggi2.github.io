<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipusRecursos extends Model
{
    use HasFactory;

    protected $table = 'tipus_recursos';
    public $timestamps = false;


    public function recursos()
    {
        return $this->hasMany(Recursos::class, 'tipus_recursos_id');
    }
}
