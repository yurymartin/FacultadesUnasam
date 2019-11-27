<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoFacultades extends Model
{
    protected $table = 'videofacultades';
    protected $fillable = ['titulo', 'descripcion', 'link', 'fecha', 'activo', 'borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];
}
