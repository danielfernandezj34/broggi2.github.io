<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpBox extends Model
{
    use HasFactory;

    protected $table = 'helpbox';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
}
