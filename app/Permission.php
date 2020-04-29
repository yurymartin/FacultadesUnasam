<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['name','guard_name','descripcion'];
    protected $guarded = ['id'];
}
