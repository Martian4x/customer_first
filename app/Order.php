<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'staff_id', 'order_no', 'ship_to_billing_address', 'ship_fname', 'ship_lname', 'ship_phone', 'ship_email', 'ship_address1', 'ship_address2', 'ship_city', 'ship_zip_code', 'ship_country', 'billing_fname', 'billing_lname', 'billing_phone', 'billing_email', 'billing_address1', 'billing_address2', 'billing_city', 'billing_zip_code', 'billing_country', 'shipping_price', 'sub_total_price', 'order_description', 'payment_method', 'order_status', 'order_status_info', 'order_status_info', 'order_status_date', 'delivered_date'];

    protected $dates = ['order_status_date', 'delivered_date', 'created_at', 'updated_at'];

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function staff()
    {
        return $this->belongsTo('\App\User', 'staff_id');
    }

    public function carts()
    {
        return $this->hasMany('\App\Cart');
    }
}
