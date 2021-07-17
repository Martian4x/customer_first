<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = ['customer_id', 'type', 'supplier_id', 'reference_id', 'amount', 'name', 'description', 'feedback'];

    // protected $dates = ['order_status_date', 'delivered_date', 'created_at', 'updated_at'];

    public function customer()
    {
    	return $this->belongsTo('\App\User', 'customer_id');
    }

    public function supplier()
    {
        return $this->belongsTo('\App\Supplier', 'supplier_id');
    }

    public static function send_airtime($data)
    {
        
        $config = \App\Configuration::first();
        $url="https://apiairtime.beem.africa/v1/transfer";

        $api_key = $config->airtime_api_key;
        $secret_key = $config->airtime_secret_key;

        // dd($secret_key);

        // $dest_addr="<dest_addr>";
        $dest_addr=$data['dest_addr'];
        $amount = $data['amount'];
        $ref = $data['reference_id'];
        $body = array('dest_addr'=>$dest_addr,'amount'=>$amount, 'reference_id'=>$ref);

        $ch = curl_init($url);
        $option = array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($body));
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($ch,$option);

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Check for errors
        if($response === FALSE){
                echo $response;

            die(curl_error($ch));
        }
        var_dump($response);
        return $response;
    }

    public function message($message_type)
    {
        if($message_type=='rewarded_airtime'){
            if($this->customer->lang=='en'){
                return $this->supplier->company_name.' been reward an airtime amount :'.$this->amount;
            }else{
                return $this->supplier->company_name.' Wamekuzawadia muda wa maongezi kiasi :'. $this->amount;
            }
        }

        return false;
    }


}
