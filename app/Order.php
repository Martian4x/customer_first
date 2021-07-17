<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'staff_id', 'supplier_id', 'courier_id', 'quantity', 'product_id', 'order_no', 'ship_to_billing_address', 'ship_fname', 'ship_lname', 'ship_phone', 'ship_email', 'ship_address1', 'ship_address2', 'ship_city', 'ship_zip_code', 'ship_country', 'billing_fname', 'billing_lname', 'billing_phone', 'billing_email', 'billing_address1', 'billing_address2', 'billing_city', 'billing_zip_code', 'billing_country', 'shipping_price', 'sub_total_price', 'order_description', 'payment_method', 'order_status', 'order_status_info', 'order_status_info', 'order_status_date', 'delivered_date'];

    protected $dates = ['order_status_date', 'delivered_date', 'created_at', 'updated_at'];

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function staff()
    {
        return $this->belongsTo('\App\User', 'staff_id');
    }

    public function supplier()
    {
        return $this->belongsTo('\App\Supplier', 'supplier_id');
    }

    public function courier()
    {
        return $this->belongsTo('\App\User', 'courier_id');
    }

    public function product()
    {
        return $this->belongsTo('\App\Product');
    }

    public function sub_total_price()
    {
        if($this->product)
            return number_format(($this->product->price*$this->quantity) + $this->shipping_price);
    }

    public function send_sms($message)
    {
		$message = 'Hello, '.$this->fname.' '.$message;
        $recepients = [['recipient_id' => '1','dest_addr'=> preg_replace('/^(?:\+?255|0)?/','255', $this->mob_no)]];
        // dd($message);
		return \App\SMS::send($recepients, $message);
    }

    public function message($message_type)
    {
        if($message_type=='order_created'){
            if($this->user->lang=='en'){
                return 'You order has been proceed with an order number :'.$this->id;
            }else{
                return 'Order yako inafanyiwa kazi, order namba :'. $this->id;
            }
        }

        if($message_type=='order_status'){
            if($this->user->lang=='en'){
                return 'You order status has been changed to :'.$this->order_status;
            }else{
                return 'Order yako imekuwa na statas ya :'. $this->order_status;
            }
        }

        if($message_type=='order_ready_pickup'){
            if($this->courier->lang=='en'){
                return 'The order is ready for Tranfer';
            }else{
                return 'Oda ipo tayari kusafirishwa';
            }
        }

        if($message_type=='order_total'){
            if($this->courier->lang=='en'){
                return 'The total order amount is '.$this->sub_total_price().'. This amount includes shipping fee.';
            }else{
                return 'Oda yako jumla ni '.$this->sub_total_price().'. Hii inajumuisha gharama za usafiri.';
            }
        }

        if($message_type=='order_status'){
            return 'You order is now has a '.$this->status;
        }

        return false;
    }
}
