<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultads';
    protected $fillable = ['nombre','activo','borrado','local_id'];
	protected $guarded = ['id'];
}
