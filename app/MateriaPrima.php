<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    public $timestamps=false;
    protected $table = 'materia_prima';
    protected $fillable = ['nombre_materia','costo_adquisicion','cantidad',
    ];
}
