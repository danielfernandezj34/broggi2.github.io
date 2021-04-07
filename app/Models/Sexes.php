<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexes extends Model
{
    use HasFactory;

    protected $table = 'sexes';
    public $timestamps = false;

    public function afectats()
    {
        return $this->hasMany(Afectats::class, 'sexes_id');
    }
}
