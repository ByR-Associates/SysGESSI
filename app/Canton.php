<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    protected $table = "cantons";

    protected $fillable = ['canton','provincia_id'];

    //una solicitud de estudio tiene una Canton
    public function provincia(){
        return $this->belongsTo('SysGESSI\Provincia');
    }
}
