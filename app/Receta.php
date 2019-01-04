<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table = 'receta';
    protected $primaryKey = 'id';
    protected $fillabel = ['producto_id','estado'];
}
