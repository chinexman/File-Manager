<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
     use SoftDeletes;
    protected $fillable = ['uuid', 'folder_id', 'user_id'];
    
    
    
    
    public function folder()
    {
        return $this->belongsTo('App\Folder');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}