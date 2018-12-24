<?php

namespace App;

class Carrito
{
  public $elementos=null;
  public $cantidadTotal=0;
  public $precioTotal=0;

  public function __construct($carritoAnt){
    if($carritoAnt){
      $this->elementos=$carritoAnt->elementos;
      $this->cantidadTotal=$carritoAnt->cantidadTotal;
      $this->precioTotal=$carritoAnt->precioTotal;
    }
  }

  public function agregar($elemento,$id){
    $guardado=['cantidad'=>0,'precio'=>$elemento->precio,'elemento'=>$elemento];
    if($this->elementos){
      if (array_key_exists($id,$this->elementos)){
        $guardado=$this->elementos[$id];
      }
    }
    $guardado['cantidad']++;
    $guardado['precio']=$elemento->precio*$guardado['cantidad'];
    $this->elementos[$id]=$guardado;
    $this->cantidadTotal++;
    $this->precioTotal+=$elemento->precio;


  }

  public function disminuir($elemento,$id){
    if($this->elementos){
      if (array_key_exists($id,$this->elementos)){
        $editado=$this->elementos[$id];
      }
    }
    $this->precioTotal-=$elemento->precio;
    $editado['cantidad']--;
    $editado['precio']=$elemento->precio*$editado['cantidad'];
    $this->elementos[$id]=$editado;
    $this->cantidadTotal--;

    if($editado['cantidad']==0){
       unset($this->elementos[$id]);
    }

     if(!$this->elementos){
        $this->cantidadTotal=0;
        $this->precioTotal=0;
      }
  }

  public function eliminar($id){
  $eliminado=$this->elementos[$id];
  $this->cantidadTotal-=$eliminado['cantidad'];
  $this->precioTotal-=$eliminado['precio'];
    unset($this->elementos[$id]);


    if(!$this->elementos){
      $this->cantidadTotal=0;
      $this->precioTotal=0;
      }
    }
    public function agregarVarios($elemento,$id,$cantidad){
      $guardado=['cantidad'=>0,'precio'=>$elemento->precio,'elemento'=>$elemento];
    if($this->elementos){
      if (array_key_exists($id,$this->elementos)){
        $guardado=$this->elementos[$id];
      }
    }
    $guardado['cantidad']=$guardado['cantidad']+$cantidad;
    $guardado['precio']=$elemento->precio*$guardado['cantidad'];
    $this->elementos[$id]=$guardado;
    $this->cantidadTotal= $this->cantidadTotal + $cantidad;
    $this->precioTotal+=$elemento->precio*$cantidad;
    }


}
