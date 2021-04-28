<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencies_has_afectats extends Model
{
    use HasFactory;

    protected $table ='incidencies_has_afectats';
    protected $primaryKey = ['incidencies_id', 'afectats_id'];
    public $incrementing = false;
    public $timestamps = false;
}
