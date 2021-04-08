<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincies extends Model
{
    use HasFactory;

    protected $table = 'provincies';
    public $timestamps = false;

    public function comarques()
    {
        return $this->hasMany(provincies::class,"provincies_id");
    }
}
