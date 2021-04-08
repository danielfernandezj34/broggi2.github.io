<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipusIncidencies extends Model
{
    use HasFactory;
    protected $table = 'tipus_incidencies';
    public $timestamps = false;

    public function incidencies()
    {
        return $this->hasMany(Incidencies::class, 'tipus_incidencies_id');
    }
}
