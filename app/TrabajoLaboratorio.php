<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class TrabajoLaboratorio extends Model
{
    protected $table= "trabajo_laboratorios";

    protected $fillable = [
        'descripcion_muestra',
        'cantidad',
        'observacion',
        'estado'
    ];


   
}
