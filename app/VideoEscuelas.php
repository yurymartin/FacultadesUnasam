<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoEscuelas extends Model
{
    protected $table = 'videoescuelas';
    protected $fillable = ['titulo', 'descripcion', 'link', 'fecha', 'activo', 'borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];
}
