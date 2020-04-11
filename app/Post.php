<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title' , 'description' , 'image' , 'meta_keywords' , 'meta_description' ,
        'slug' , 'user_id' , 'category_id'
    ];

    public function user()

    {

        return $this->belongsTo('App\User' , 'user_id');

    }

    public function category()

    {

        return $this->belongsTo('App\Category' , 'category_id');

    }

    public function comments()

    {

        return $this->hasMany(Comment::class)->whereNull('parent_id');

    }

}
