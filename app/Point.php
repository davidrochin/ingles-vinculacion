<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{

    //Propiedad "guarded" para evitar MassAsignmentException
    protected $guarded = [
        'id'
    ];

	
    public $timestamps = false;
}
