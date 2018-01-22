<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clima extends Model
{
   protected $table = "apoios";

  	protected $fillable = [
  		'temperature',
		'wind_direction',
		'wind_velocity',
		'humidity',
		'condition',
		'pressure',
		'icon',
		'sensation',
 	];
}
