<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
   protected $table = "telefonos";

    protected $fillable = [
        'tipo_telefono', 
        'numero',
        'cliente'      
    ];   

    //muchos telefonos pertenecen a un cliente
    public function cliente(){
    	return $this->belongsTo('SysGESSI\Cliente');
    }
}
