<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleLote extends Model
{
    protected $table = 'detalle_lote';
    protected $primaryKey = 'id';
    protected $fillabel = ['id_lote','numero_obreros','numero_horas','precio_hora','sub_total_MO','suma_materiales','tasa_cif','importe','cantidad_unidades'];
}
