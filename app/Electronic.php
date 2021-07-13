<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Electronic extends Model
{
    protected $fillable = ['product_id', 'electronic_type', 'electronic_specs',  'electronic_other_specs', 'electronic_os', 'electronic_brand', 'electronic_model', 'electronic_color', 'electronic_weight', 'electronic_size', 'electronic_height', 'electronic_condition', 'electronic_release_date'];

    public function product()
    {
    	return $this->belongsTo('\App\Product');
    }
}
