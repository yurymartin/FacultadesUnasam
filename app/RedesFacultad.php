<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedesFacultad extends Model
{
    protected $table = 'redesfacultades';
    protected $fillable = ['facebook','google','youtube','twitter','instagram','linkedln','pinterest','activo', 'borrado','created_at','updated_at','facultad_id'];
    protected $guarded = ['id'];
}
