<?php

namespace SysGESSI;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = "provincias";

    protected $fillable = [
        'provincia'
    ];
}
