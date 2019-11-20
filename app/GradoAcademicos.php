<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradoAcademicos extends Model
{
    protected $table = 'gradoacademicos';
    protected $fillable = ['grado', 'abreviatura', 'activo', 'borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];
}
