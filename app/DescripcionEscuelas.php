<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DescripcionEscuelas extends Model
{
    protected $table = 'descripcionescuelas';
    protected $fillable = ['descripcion', 'titulo','gradoacad','duracion','logo','activo', 'borrado','created_at','updated_at'];
    protected $guarded = ['id'];
}
