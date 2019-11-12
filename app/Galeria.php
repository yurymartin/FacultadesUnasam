<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $fillable = ['tituloFoto', 'descrFoto', 'ruta', 'fecha', 'user_id', 'activo', 'borrado'];
    protected $guarded = ['id'];
}
