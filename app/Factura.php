<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table= "facturas";

    protected $fillable = [
        'numero_factura',
        'solicitudEstudio',
        'codigo',
        'fecha',
        'subtotal',
        'descuento',
        'iva',
        'total',
        'estado'
    ];

    //MUCHAS facturas le pertenecen a UNA solicitud de estudio
    public function solicitudEstudio(){
        return $this->belongsTo('SysGESSI\SolicitudEstudio');
    }
}
