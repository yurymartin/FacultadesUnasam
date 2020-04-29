<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    protected $fillable = ['titulo', 'descripcion', 'fechapublicacion', 'imagen', 'ruta', 'autor', 'activo', 'borrado', 'created_at', 'updated_at', 'escuela_id', 'tema_id', 'tipopublicacion_id'];
    protected $guarded = ['id'];
}
