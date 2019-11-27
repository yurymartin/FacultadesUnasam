<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    protected $table = 'perfiles';
    protected $fillable = ['descripcion', 'perfil','activo', 'borrado', 'created_at', 'updated_at', 'escuela_id'];
    protected $guarded = ['id'];
}
