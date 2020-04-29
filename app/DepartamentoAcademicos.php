<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartamentoAcademicos extends Model
{
    protected $table = 'departamentoacademicos';
    protected $fillable = ['nombre', 'descripcion', 'activo', 'borrado','created_at','updated_at','facultad_id'];
    protected $guarded = ['id'];
}
