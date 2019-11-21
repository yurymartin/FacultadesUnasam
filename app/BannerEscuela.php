<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerEscuela extends Model
{
    protected $table = 'bannersescuelas';
    protected $fillable = ['titulo','descripcion','imagen','fechapublica','activo','borrado','created_at','updated_at','escuela_id'];
	protected $guarded = ['id'];
}
