<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estilo extends Model
{
    protected $table = 'estilos';
    protected $fillable = ['fondoheader', 'textoheader', 'fondofooter', 'textofooter','fondonavbar','textonavbar','activo','borrado', 'created_at', 'updated_at','facultad_id'];
    protected $guarded = ['id'];
}
