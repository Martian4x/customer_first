<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Craft extends Model
{
    protected $fillable = ['product_id', 'craft_brand', 'craft_price', 'craft_price_discount', 'craft_color', 'craft_technics', 'craft_sleeve_length', 'craft_style', 'craft_material', 'craft_item_type', 'craft_thickness', 'craft_model_number', 'craft_age_range', 'craft_gender', 'craft_size'];

    public function product()
    {
    	return $this->belongsTo('\App\Product');
    }
}
