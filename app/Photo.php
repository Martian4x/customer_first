<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['product_id', 'filename', 'original_name', 'url', 'title', 'description'];


    public function product()
    {
    	return $this->belongsTo('\App\Product');
    }
}
