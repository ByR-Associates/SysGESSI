<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class BitacoraLaboratorio extends Model
{
    protected $table = "bitacora_laboratorios";

    protected $fillable = [
        'trabajo_laboratorio_id',
        'usuario_id',
        'fecha_inicio',
        'fecha_fin'
    ];
}
