<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class costeo extends Model{

    protected $table = 'lote';
    protected $primaryKey = 'id';
    protected $fillabel = ['producto','codigoLote','total'];

}

?>
