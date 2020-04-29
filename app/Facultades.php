<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultades extends Model
{
    protected $table = 'facultades';
    protected $fillable = ['nombre','codigo','telefono','direccion','email','activo','borrado'];
	protected $guarded = ['id'];
}
