<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

     
    protected $fillable = [
        'title', 'content', 'category_id', 'featrued','user_id','slug'
    ];


    protected $dates = ['deleted_at'];
    

    public function getFeatruedAttribute($featrued)
    {
        return asset($featrued);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
 
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }


    
}
