<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','is_active',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
         return $this->belongsTo('App\Role');
    }

    public function photo()
    {
         return $this->belongsTo('App\Photo');
    }

    public function setPasswordAttribute($password)
    {
         if(!empty($password))
         {
              $this->attributes['password'] = bcrypt($password);
         }
    }

    public function isAdmin()
    {
          if($this->role['name'] == "administrator" && $this->is_active == 1)
          {
               return true;
          }
          else
          return false;
    }

    public function posts()
    {
         return $this->hasMany('App\Post');
    }
}
