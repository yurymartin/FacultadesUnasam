<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    protected $fillable = ['nombreInstrumento','codigoInstrumento','ruta','user_id','activo','borrado'];
	protected $guarded = ['id'];
}
