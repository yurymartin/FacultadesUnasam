<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['tituloEvento','descrEvento','rutaImg','rutaDoc','fecha','user_id','activo','borrado'];
	protected $guarded = ['id'];
}
