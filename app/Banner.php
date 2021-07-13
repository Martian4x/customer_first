<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
   	 protected $fillable = ['name', 'caption', 'img', 'status', 'url', 'description', 'start_day', 'end_day'];

   	 protected $dates = ['start_day', 'end_day', 'created_at', 'updated_at'];

   	  public static function status()
   	 {
	   	return $status = ['Show'=>'Show','Hide'=>'Hide','Scheduled'=>'Scheduled'];
   	 } 
}
