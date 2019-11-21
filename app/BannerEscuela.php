<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerEscuela extends Model
{
    protected $table = 'bannersescuelas';
    protected $fillable = ['titulo','descripcion','imagen','fechapublica','escuela_id','activo','borrado'];
	protected $guarded = ['id'];
}
