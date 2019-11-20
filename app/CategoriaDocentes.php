<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaDocentes extends Model
{
    protected $table = 'categoriadocentes';
    protected $fillable = ['categoria', 'activo', 'borrado','created_at','updated_at'];
    protected $guarded = ['id'];
}
