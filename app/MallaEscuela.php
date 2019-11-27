<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MallaEscuela extends Model
{
    protected $table = 'mallas';
    protected $fillable = ['imagen', 'numcurricula','fechaRegistro', 'activo', 'borrado','created_at','updated_at','escuela_id'];
    protected $guarded = ['id'];
}
