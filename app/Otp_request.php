<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otp_request extends Model
{
    protected $fillable = ['user_id', 'json_feedback'];

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
