<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigaciones extends Model
{
    protected $table = 'investigacion';
    protected $fillable = ['titulo','descripcion','fechapublicacion','imagen','ruta','activo','borrado','created_at','updated_at','docente_id','tema_id'];
    protected $guarded = ['id'];
}
