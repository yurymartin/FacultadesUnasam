<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaRectoral extends Model
{
    protected $fillable = ['ruta','fechaAgenda','user_id','activo','borrado'];
    protected $guarded = ['id'];
    protected $table = "agendarectorals";
}
