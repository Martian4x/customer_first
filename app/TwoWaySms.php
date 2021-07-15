<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwoWaySms extends Model
{
    protected $fillable = ['from', 'to',  'channel', 'timeUTC', 'transaction_id', 'message', 'billing', 'direction'];
}
