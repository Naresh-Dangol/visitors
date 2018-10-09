<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
	protected $table = 'global_settings';
	
    protected $fillable = [
    	'organisation_name',
    	'title',
    	'address',
    	'email',
    	'fav_icon',
    	'logo'
    ];
}
