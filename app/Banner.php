<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['tituloBanner','descrBanner','ruta','fecha','user_id','activo','borrado'];
	protected $guarded = ['id'];
}
