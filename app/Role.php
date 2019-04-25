<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     protected $fillable = ['title'];



     public function user(){
     	return $this->belongsto('App\User');
     }
}
