<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedesEscuela extends Model
{
    protected $table = 'redesescuelas';
    protected $fillable = ['facebook','google','youtube','twitter','instagram','linkedln','pinterest','activo', 'borrado','created_at','updated_at','escuela_id'];
    protected $guarded = ['id'];
}
