<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = 'escuelas';
    protected $fillable = ['nombre', 'descripcion', 'activo', 'borrado','created_at','updated_at'];
    protected $guarded = ['id'];
}
