<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsSendRequest extends Model
{
    protected $fillable = ['user_id','recepients','message','json_feedback', 'send_time'];
}
