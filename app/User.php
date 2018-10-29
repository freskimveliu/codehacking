<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //This is mass assignment

    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_active'=>'boolean',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function photo(){
        return $this->BelongsTo(Photo::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function isAdmin(){
        if($this->role->name == 'administrator' && $this->is_active){
            return true;
        }
        return false;
    }
}
