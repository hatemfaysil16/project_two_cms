<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user(){
        return $this->belongsTo('App\Models\User');
    }


    protected $fillable = [
        'avatar', 'user_id', 'facebook','twitter','github','about' 
    ];



    // public function getFeatruedAttribute($avatar)
    // {
    //     return asset($avatar);
    // }
 

}
