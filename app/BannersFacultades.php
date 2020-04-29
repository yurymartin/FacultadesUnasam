<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannersFacultades extends Model
{
    protected $table = 'bannerfacultades';
    protected $fillable = ['titulo','descripcion','imagen','fechapublica','activo','borrado','created_at','updated_at','facultad_id'];
	protected $guarded = ['id'];
}
