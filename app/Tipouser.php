<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipouser extends Model
{
    protected $table = 'tipousers';
    protected $fillable = ['tipo','activo','borrado','created_at','updated_at'];
	protected $guarded = ['id'];
}
