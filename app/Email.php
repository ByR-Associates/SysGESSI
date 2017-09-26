<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = "emails";

    protected $fillable = [
        'tipo_email', 
        'email'      
    ];   

    //muchos emails pertenecen a un cliente
    public function cliente(){
    	return $this->belongsTo('SysGESSI\Cliente');
    }
}
