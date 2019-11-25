<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibroEscuela extends Model
{
    protected $table = 'libros';
    protected $fillable = ['titulo','descripcion','fechapublicacion','imagen','ruta','autor','activo','borrado','created_at','updated_at','escuela_id'];
	protected $guarded = ['id'];
}
