<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoFacultades extends Model
{
    protected $table = 'documentofacultades';
    protected $fillable = ['titulo', 'descripcion','imagen', 'ruta','fecha','activo', 'borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];
}
