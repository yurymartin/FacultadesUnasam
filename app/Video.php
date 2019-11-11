<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['tituloVideo','ruta','estado','fecha','user_id','tipovideo_id','activo','borrado'];
	protected $guarded = ['id'];
}
