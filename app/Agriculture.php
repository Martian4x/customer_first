<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agriculture extends Model
{
    protected $fillable = ['product_id', 'agri_brand', 'agri_crop_type', 'agri_quality', 'agri_size', 'agri_weight', 'agri_packaging', 'agri_origin', 'agri_color'];

    public function product()
    {
    	return $this->belongsTo('\App\Product');
    }
}
