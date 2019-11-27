<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampoLaborales extends Model
{
    protected $table = 'campolaborales';
    protected $fillable = ['titulo', 'campolab','imagen','fecha','activo','borrado','created_at','updated_at','escuela_id'];
    protected $guarded = ['id'];
}
