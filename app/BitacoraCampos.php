<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class BitacoraCampos extends Model
{
    protected $table = "bitacora_campos";

    protected $fillable = [
        'trabajo_campo_id',
        'usuario_id',
        'fecha_inicio',
        'fecha_fin'
    ];
}
