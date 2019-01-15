<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
  protected $table = 'ordenes';


  protected $fillable = ['codigo_seguimiento','estado_servicio','estado_pago','tipo_orden','mesa_id','user_id'
  ];

public function usuario(){
return $this->belongsTo(User::class);
}

public function detalles()
{
return $this->hasMany(DetalleOrden::class);
}

public function mesa()
{
    return $this->belongsTo(Mesa::class);
}

public function pago(){
return $this->hasOne(Pago::class);
}
//pago,user

}
