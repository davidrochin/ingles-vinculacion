<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public $timestamps = false;

    //Para buscar carreras
    public function scopeSearch($query, $keyword){
    	return $query->where('name', 'LIKE', '%'.$keyword.'%')
    		->orWhere('id', 'LIKE', '%'.$keyword.'%')
    		->orWhere('short_name', 'LIKE', '%'.$keyword.'%');
    }

}
