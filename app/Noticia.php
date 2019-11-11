<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = ['tituloNoticia','descrNoticia','fechaNoticia','horaNoticia','user_id','ruta','activo','borrado'];
	protected $guarded = ['id'];
}
