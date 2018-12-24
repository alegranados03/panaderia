<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $table = 'productos';
  protected $fillable = ['nombre_producto','stock','imagen','descripcion','categoria_id','precio'
  ];

  public function categoria()
  {
      return $this->belongsTo(Categoria::class);
  }
}
