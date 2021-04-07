<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afectats extends Model
{
    use HasFactory;

    protected $table = 'afectats';
    public $timestamps = false;

    public function sexes()
    {
        return $this->belongsTo(Sexes::class, 'sexes_id');
    }
}
