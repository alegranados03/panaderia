<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $table = 'pagos';
  protected $fillable = ['orden_id','tipo_pago','total_cancelar','recibido','cambio',];
  public function orden()
 {
     return $this->belongsTo(Orden::class);
 }
}
