<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    //
    protected $table = 'lote';
    protected $fillable = ['producto','codigoLote','total'];

}
