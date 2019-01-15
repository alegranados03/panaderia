<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
  protected $table = 'mesas';

  public $timestamps = false;
  protected $fillable = ['codigo_mesa','capacidad_personas',
  ];
  public function ordenes(){
  return $this->hasMany(Orden::class);
  }


}
