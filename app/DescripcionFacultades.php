<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DescripcionFacultades extends Model
{
    protected $table = 'descripcionfacultades';
    protected $fillable = ['descripcion', 'reseñahistor','mision','vision','imagen','filosofia','activo', 'borrado','created_at','updated_at'];
    protected $guarded = ['id'];
}
