<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class User extends Authenticatable
{
    use Notifiable;

    
     protected $fillable = ['name', 'email', 'password', 'remember_token', 'role_id'];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   public function folders()
    {
        return $this->hasMany('App\Folder');
    }
    
    public function files()
    {
        return $this->hasMany('App\File');
    }

}
