<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{

  protected $table = 'detalles_orden';

  public $timestamps = false;
  protected $fillable = ['orden_id','producto_id','cantidad_producto','total_parcial',];
  
  public function orden()
{
    return $this->belongsTo(Orden::class);
}

}
