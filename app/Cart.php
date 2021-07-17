<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'order_id', 'quantity', 'transport_fee','supplier_id','courier_id'];

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function order()
    {
        return $this->belongsTo('\App\Order');
    }

    // public function products()
    // {
    //     return $this->hasMany('\App\Pro')
    // }

    public function product()
    {
    	return $this->belongsTo('\App\Product');
    }

    public static function subtotal($cart_list)
    {
        $total = 0;
        foreach ($cart_list as $cart) {
            $total += $cart->quantity*$cart->product->price_discount;
        }
        return $total;
    }
}
