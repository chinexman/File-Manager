<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;


class Folder extends Model
{
   use SoftDeletes;

   protected $fillable = [
        'name', 'user_id'
    ];

    
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function files(){
    	return $this->hasMany('App\File'); 
    }


}
