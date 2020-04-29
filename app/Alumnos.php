<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $table = 'alumnos';
    protected $fillable = ['activo', 'borrado','created_at','updated_at','persona_id','comiestudiantil_id','facultad_id'];
    protected $guarded = ['id'];    
}
