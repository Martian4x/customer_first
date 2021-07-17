<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['entered_by_id', 'user_id', 'supplier_id', 'company_name', 'supplier_img', 'supplier_img_url', 'supplier_address', 'supplier_mob_no', 'supplier_tel_no', 'supplier_postal_code', 'supplier_email', 'supplier_country', 'supplier_verified', 'supplier_status', 'supplier_description'];

    public function products() // 
    {
        return $this->hasMany('\App\Product');
    }

    public function orders() // 
    {
        return $this->hasMany('\App\Order');
    }

    public function messages() // 
    {
        return $this->hasMany('\App\Message');
    }

    public function invoices() // 
    {
        return $this->hasMany('\App\Invoice');
    }

    public function user()
    {
    	return $this->belongsTo('\App\User','user_id');
    }

    public function entered_by()
    {
    	return $this->belongsTo('\App\User','entered_by_id');
    }

    public function customers()
    {
        return $this->belongsToMany('App\User', 'supplier_user', 'supplier_id', 'user_id');
    }

    public function partners()
    {
        return $this->belongsToMany('App\User', 'supplier_partner', 'supplier_id', 'user_id');
    }

    public function couriers()
    {
        return $this->belongsToMany('App\User', 'supplier_courier', 'supplier_id', 'user_id');
    }

    public function getMsg($name, $lang=null)
    {
        return $this->messages()->whereName(strtolower($name))->whereLang($lang)->latest()->first();
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
    { //'Pending','Draft','Request','Solved' label-warning
        if($value == 'Banned'){
            return 'label-danger';
        }elseif($value == 'Pending'){
            return 'label-warning';
        }elseif($value == 'Inactive'){
            return 'label-info';
        }elseif($value == 'Active'){
            return 'label-success';
        }
    }

    public function message($message_type)
    {
        if($message_type=='supplier_welcome'){
            if($this->user->lang=='en'){
                return 'Hi '.$this->company_name.', welcome to CustomerFirst Platform. Use your email and password to login.';
            }else{
                return 'Hey '. $this->company_name.' karibu kwenye platform ya CustomerFirst. Tumia email na password kuingia';
            }
        }

        return false;
    }
}
