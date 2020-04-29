<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    protected $fillable = ['cargo','descripcion ','activo', 'borrado','created_at','updated_at','facultad_id'];
    protected $guarded = ['id'];
}
