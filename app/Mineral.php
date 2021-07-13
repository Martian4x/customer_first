<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mineral extends Model
{
    protected $fillable = ['product_id', 'mineral_product_type', 'mineral_brand', 'mineral_size', 'mineral_weight', 'mineral_quality', 'mineral_color', 'mineral_origin'];

    public function product()
    {
    	return $this->belongsTo('\App\Product');
    }
}
