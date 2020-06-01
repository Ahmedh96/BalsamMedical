<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Page extends Model
{
    use Translatable;

    public $translatedAttributes = ['name' , 'description'];

    protected $fillable = [
        'meta_keywords' , 'meta_description'
    ];
}
