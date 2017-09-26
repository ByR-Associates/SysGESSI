<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class SolicitudEstudio extends Model
{
    protected $table= "solicitud_estudios";

    protected $fillable = [
        'descripcion',
        'cliente',
        'obra',
        'parroquia',
        'direccion',
        'referencia',
        'coordenadas',
        'contacto',
        'estado'
    ];


    //muchas solicitudes de estudio pertenecen a un cliente
    public function cliente(){
        return $this->belongsTo('SysGESSI\Cliente');
    }

    //una solicitud de estudio tiene una parroquia
    public function parroquia(){
        return $this->belongsTo('SysGESSI\Parroquia');
    }

    //una solicitud de estudio tiene muchas ordenes de trabajo
    public function ordenesTrabajo(){
        return $this->hasMany('SysGESSI\OrdenTrabajo');
    }

    public function factura(){
        return $this->hasMany('SysGESSI\Factura');
    }
}
