<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComiteEstudiantil extends Model
{
    protected $table = 'comiestudiantiles';
    protected $fillable = ['titulo','descripcion','imagen','activo','borrado','created_at','updated_at'];
	protected $guarded = ['id'];
}
