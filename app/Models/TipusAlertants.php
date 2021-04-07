<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipusAlertants extends Model
{
    use HasFactory;

    protected $table = 'tipus_alertants';
    public $timestamps = false;
}
