<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    //
    protected $fillable = ['entered_by_id', 'slug', 'supplier_id', 'maincategory_id', 'subcategory_id', 'name', 'product_img', 'product_img_url', 'product_address', 'quantity', 'min_quantity', 'quantity_unit', 'price', 'price_discount', 'product_country', 'type', 'status', 'status_info', 'description'];

    public static function types()
    {
    	return ['Agriculture'=>'Agriculture','Clothing'=>'Clothing','Textile'=>'Textile','Craft'=>'Craft','Food'=>'Food','Manufacturing'=>'Manufacturing','Electronic'=>'Electronic'];
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function photos() // 
    {
        return $this->hasMany('\App\Photo');
    }

    public function supplier()
    {
    	return $this->belongsTo('\App\Supplier');
    }

    public function subcategory()
    {
    	return $this->belongsTo('\App\Subcategory');
    }

    public function maincategory()
    {
    	return $this->belongsTo('\App\Maincategory');
    }

    public function agriculture() // 
    {
        return $this->hasOne('\App\Agriculture','product_id');
    }

    public function clothing() // 
    {
        return $this->hasOne('\App\Clothing','product_id');
    }

    public function craft() // 
    {
        return $this->hasOne('\App\Craft','product_id');
    }

    public function electronic() // 
    {
        return $this->hasOne('\App\Electronic','product_id');
    }

    public function manufacturing() // 
    {
        return $this->hasOne('\App\Manufacturing','product_id');
    }

    public function mineral() // 
    {
        return $this->hasOne('\App\Mineral','product_id');
    }

    public function food() // 
    {
        return $this->hasOne('\App\Food','product_id');
    }

    public function textile() // 
    {
        return $this->hasOne('\App\Textile','product_id');
    }

    public function user()
    {
    	return $this->belongsTo('\App\User','user_id');
    }

    public function entered_by()
    {
    	return $this->belongsTo('\App\User','entered_by_id');
    }

    public function ribbon_color($value)
    {
        if($value == 'Hot'){
            return 'rgba-red';
        }elseif($value == 'New'){
            return 'rgba-blue';
        }elseif($value == 'Corrected'){
            return 'rgba-purple';
        }
    }

    // Span color
    public function label_color($value)
    { //'Rejected','Accepted','Review','Pending'
        if($value == 'Rejected'){
            return 'label-danger';
        }elseif($value == 'Pending'){
            return 'label-warning';
        }elseif($value == 'Review'){
            return 'label-info';
        }elseif($value == 'Accepted'){
            return 'label-success';
        }
    }


    public static function status_list()
    {
        return ['Rejected'=>'Rejected','Accepted'=>'Accepted','Review'=>'Review','Pending'=>'Pending','Out-Of-Stock'=>'Out-Of-Stock'];
    }

    
    public function message($message_type)
    {
        if($message_type=='new_product'){
            return 'Hey, we have new '.$this->name.', come checkout!.';
            // if($this->user->lang=='en'){
            // }else{
            //     return 'Helo, Tuna '. $this->name.', unaonaje uje kucheck!.';
            // }
        }

        return false;
    }
}
