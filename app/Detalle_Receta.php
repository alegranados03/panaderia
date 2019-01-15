<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Receta extends Model
{

    protected $table = 'detalle_receta';
    protected $primaryKey = 'id';
    protected $fillabel = ['receta_id','producto_id','materiaPrima_id','cantidad_individual'];
}
