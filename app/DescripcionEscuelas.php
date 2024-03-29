<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DescripcionEscuelas extends Model
{
    protected $table = 'descripcionescuelas';
    protected $fillable = ['descripcion', 'tituloprofesional','gradoacade','duracion','logo','mision','vision','historia','activo', 'borrado','created_at','updated_at','escuela_id'];
    protected $guarded = ['id'];
}
