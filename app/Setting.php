<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Setting extends Model
{
    use Translatable;

    protected $table    = 'settings';
    public $translatedAttributes = ['sitename' , 'description'];

	protected $fillable = [
		'logo',
		'icon',
		'email',
		'keywords',
		'status',
        'message_maintenance',
        'address',
        'phone' ,
        'facebook' ,
        'instagram' ,
        'twitter',
		'main_lang',
    ];

}
