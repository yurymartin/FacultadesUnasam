<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GaleriaFacultades extends Model
{
    protected $table = 'galeriafacultades';
    protected $fillable = ['imagen','descripcion','activo','borrado', 'created_at', 'updated_at','facultad_id'];
    protected $guarded = ['id'];
}
