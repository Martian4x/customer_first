<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['supplier_id','body','status','name'];

    public function supplier()
    {
    	return $this->belongsTo('\App\Supplier');
    }

}
