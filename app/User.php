<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    protected $guard_name = "admin";
    protected $table = "usuarios";
    
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre','apellido','documento_identidad', 'email', 'password','avatar','last_login',
    ];
    
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login' => 'datetime',
    ];
    
    public function nombre_completo()
    {
        return "{$this->nombre} {$this->apellido}";
    }
    
    public function getRouteKeyName()
    {
        return "documento_identidad";
    }
    
    public function getAvatar()
    {
        return ($this->avatar) ? Storage::disk('avatar')->url("avatars/{$this->avatar}") : '/images/default_user.png';
    }
}
