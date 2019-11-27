<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalEscuela extends Model
{
    protected $table = 'galescuelas';
    protected $fillable = ['imagen', 'descripcion', 'activo', 'borrado','created_at','updated_at','escuela_id'];
    protected $guarded = ['id'];
}
