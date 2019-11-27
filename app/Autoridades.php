<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autoridades extends Model
{
    protected $table = 'autoridades';
    protected $fillable = ['descripcion','fechainicio','fechafin','activo', 'borrado','created_at','updated_at','cargo_id','persona_id'];
    protected $guarded = ['id'];
}
