<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temas extends Model
{
    protected $table = 'temas';
    protected $fillable = ['tema','activo', 'borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];
}
