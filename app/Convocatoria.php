<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    protected $fillable = ['convocatoria','requerido','asignaturas','nroplazas','fechaini','fechafin','ruta','condicion','tipoconvocatoria_id','facultad_id','user_id','activo','borrado'];
	protected $guarded = ['id'];
}
