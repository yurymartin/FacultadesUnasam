<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticiaFacultades extends Model
{
    protected $table = 'noticiafacultades';
    protected $fillable = ['titulo','descripcion','imagen','fechapubli','activo', 'borrado','created_at','updated_at','facultad_id'];
    protected $guarded = ['id'];
}
