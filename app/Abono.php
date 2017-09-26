<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    protected $table = "abonos";

    protected $fillable = [
    	'solicitud_estudio_id'
        'fecha',
        'metodo_pago_id',
        'detalle',
        'total'
    ];
}
