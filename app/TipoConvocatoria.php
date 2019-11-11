<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoConvocatoria extends Model
{
    protected $table = 'tipoconvocatorias';
    protected $fillable = ['nombre','activo','borrado'];
	protected $guarded = ['id'];
}
