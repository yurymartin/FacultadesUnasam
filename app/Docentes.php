<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    protected $table = 'docentes';
    protected $fillable = ['curricula', 'tituloprofe', 'fechaingreso', 'activo', 'borrado','created_at','updated_at','gradoacademico_id','categoriadocen_id','persona_id'];
    protected $guarded = ['id'];
}
