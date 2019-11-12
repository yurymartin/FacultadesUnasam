<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultades extends Model
{
    protected $table = 'facultades';
    protected $fillable = ['nombre','codigo','activo','borrado','departamentoacad_id'];
	protected $guarded = ['id'];
}
