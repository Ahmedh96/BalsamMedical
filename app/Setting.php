<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table    = 'settings';
	protected $fillable = [
		'sitename',
		'logo',
		'icon',
		'email',
		'description',
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
