<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organigrama extends Model
{
    protected $table = 'organigramafacultades';
    protected $fillable = ['imagen','fecha','activo','borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];}
