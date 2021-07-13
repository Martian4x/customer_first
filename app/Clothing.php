<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clothing extends Model
{
    protected $fillable = ['product_id', 'cloth_brand', 'cloth_color', 'cloth_technics', 'cloth_sleeve_length', 'cloth_sleeve_style', 'cloth_cloth_style', 'cloth_cloth_material', 'cloth_item_type', 'cloth_thickness', 'cloth_model_number', 'cloth_age_range', 'cloth_gender', 'cloth_size'];

    public function product()
    {
    	return $this->belongsTo('\App\Product');
    }
}
