<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NosotrosEscuelas extends Model
{
    protected $table = 'nosotrosescuelas';
    protected $fillable = ['descripcion', 'mision','vision','historia','filosofia','activo', 'borrado','created_at','updated_at','escuela_id'];
    protected $guarded = ['id'];
}
