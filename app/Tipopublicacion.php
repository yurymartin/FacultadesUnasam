<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipopublicacion extends Model
{
    protected $table = 'tipopublicaciones';
    protected $fillable = ['tipo','activo','descripcion','borrado','created_at','updated_at'];
    protected $guarded = ['id'];
}
