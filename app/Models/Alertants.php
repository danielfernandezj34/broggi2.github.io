<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alertants extends Model
{
    use HasFactory;

    protected $table = 'alertants';
    public $timestamps = false;

    public function incidencies()
    {
        return $this->hasMany(Incidencies::class, 'alertants_id');
    }

    public function tipus_alertants()
    {
        return $this->belongsTo(TipusAlertants::class, 'tipus_alertants_id');
    }

    public function municipis()
    {
        return $this->belongsTo(Municipis::class, 'municipis_id');
    }
}
