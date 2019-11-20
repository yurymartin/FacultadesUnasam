<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    protected $fillable = ['cargo', 'activo', 'borrado'];
    protected $guarded = ['id'];
}
