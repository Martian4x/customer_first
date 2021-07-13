<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Textile extends Model
{
    protected $fillable = ['product_id', 'textile_brand', 'textile_price', 'textile_price_discount', 'textile_color', 'textile_technics', 'textile_sleeve_length', 'textile_style', 'textile_material', 'textile_item_type', 'textile_thickness', 'textile_model_number', 'textile_age_range', 'textile_gender', 'textile_size'];

    public function product()
    {
    	return $this->belongsTo('\App\Product');
    }
}
