<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Permission;

class Rol_has_Permission extends Model
{
    protected $table = 'role_has_permissions';
    protected $fillable = ['name','guard_name'];
    protected $guarded = ['id'];
    
    public function Roles()
    {
        return $this->hasMany('App\Role');
    }

    public function Permissions()
    {
        return $this->hasMany('App\Permission');
    }
}
