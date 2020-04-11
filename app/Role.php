<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function permissions() {
        return $this->belongsToMany('App\Permission' , 'permission_role');
    }

    public function admins() {
        return $this->belongsToMany('App\User' , 'role_user');
    }
}
