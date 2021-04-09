<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comarques extends Model
{
    use HasFactory;

    protected $table = 'comarques';
    public $timestamps = false;

    public function provincia()
    {
        return $this->belongsTo(Provincies::class, 'provincies_id');
    }

    public function municipis()
    {
        return $this->hasMany(Municipis::class, 'comarques_id');
    }
}
