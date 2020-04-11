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
		'main_lang',
	];
}
