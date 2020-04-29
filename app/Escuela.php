<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = 'escuelas';
    protected $fillable = ['nombre','telefono','direccion','email','activo', 'borrado','created_at','updated_at','departamentoacademico_id'];
    protected $guarded = ['id'];
}
