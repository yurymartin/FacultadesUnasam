<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoFacultades extends Model
{
    protected $table = 'eventofacultades';
    protected $fillable = ['titulo','descripcion','imagen','fechainicio','fechafin','fechapublicac','activo', 'borrado','created_at','updated_at'];
    protected $guarded = ['id'];
}
