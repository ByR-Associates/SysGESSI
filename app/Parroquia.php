<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
	protected $table= "parroquias";

    protected $fillable = [
        'parroquia'
    ];

    //una solicitud de estudio tiene una Canton
    public function canton(){
        return $this->belongsTo('SysGESSI\Canton');
    }
}
