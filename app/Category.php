<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name' , 'meta_keywords' , 'meta_description' , 'slug' , 'parent_id'];

    public function children()
    {
      return $this->hasMany('App\Category', 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
