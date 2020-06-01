<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Post extends Model
{
    use Translatable;

    public $translatedAttributes = ['title' , 'description'];

    protected $fillable = [
        'image' , 'meta_keywords' , 'meta_description' ,
        'user_id' , 'category_id'
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
