<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $fillable = ['nombre','dni_ruc','codigo_alumno','direccion','activo','borrado','escuela_id','tipopersona_id'];
	protected $guarded = ['id'];
}
