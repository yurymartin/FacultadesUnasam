<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $fillable = ['dni','nombres','apellidos','foto','activo','borrado'];
	protected $guarded = ['id'];
}
