<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    protected $table= "orden_trabajos";

    protected $fillable = [
        'solicitud_estudio_id',
        'descripcion',
        'fecha',
        'usuarioResponsable',
        'image',
        'observacion',
        'extras',
        'estado'
    ];

    //MUCHAS ordenes de trabajo le pertenecen a UNA solicitud de estudio
    public function solicitudEstudio(){
        return $this->belongsTo('SysGESSI\SolicitudEstudio');
    }

    //MUCHAS ordenes de trabajo estan autorizados por UN usuario
    public function usuarioResponsable(){
        return $this->belongsTo('SysGESSI\User');
    }

    //UNA ordern de trabajo le pertenece a UN trabajo de campo
	public function trabajoCampo() {
        return $this->hasOne('SysGESSI\TrabajoCampo');
    }

    public function informeFinal() {
        return $this->hasMany('SysGESSI\InformeFinal');
    }

}
