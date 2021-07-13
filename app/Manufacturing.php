<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturing extends Model // Food and bevarages
{
    protected $fillable = ['product_id', 'manufact_product_type', 'manufact_model', 'manufact_brand', 'manufact_color', 'manufact_weight', 'manufact_size', 'manufact_capacity', 'manufact_origin', 'manufact_material', 'manufact_composition', 'manufact_condition', 'manufact_expire_date', 'manufact_manufactured_date'];


    protected $dates = ['expire_date', 'manufactured_date', 'created_at', 'updated_at'];

    public function product()
    {
    	return $this->belongsTo('\App\Product');
    }
}
