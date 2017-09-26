<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $table = "clientes";

    protected $fillable = [
        'tipo_documento', 
        'numero_documento',
        'nombre',
        'apellido',
        'parroquia',
        'direccion'
    ];

    protected $hidden = [
        'activo'
    ];


   //un cliente tiene una provincia
    public function provincia_id(){
        return $this->hasOne('SysGESSI\Provincia','id');
    }

    public function getFullName() {
        return $this->nombre . ' ' . $this->apellido;
    }

/*    //un cliente tiene un canton
    public function canton(){
        return $this->hasOne('STD\Canton');
    }

*/
    //uno cliente tiene una parroquia
    public function parroquia(){
        return $this->belongsTo('SysGESSI\Parroquia');
    }

    //muchos telefonos pertenecen a un cliente
    public function telefonos(){
    	return $this->hasMany('SysGESSI\Telefono');//->select(array('Numero'));
    }

    //muchos email pertenecen a un cliente
    public function emails(){
    	return $this->hasMany('SysGESSI\Email');
    }

    /*//muchos articulos petenecen a un usuario
    public function user(){
    	return $this->belongsTo('STD\User');
    }

    //un articulo puede tener muchas imagenes
    public function images(){
    	return $this->hasMany('STD\Image');
    }

   //uno a uno
    public function images(){
        return $this->hasOne('STD\Image');
    }

    //relacion de muchos a muchos
    public function tags(){
    	return $this->belongsToMany('STD\Tag');
    }*/
}
