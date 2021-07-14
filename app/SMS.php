<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    protected $api_key='252d113e8d925e8c';
    protected $secret_key = 'ODcwMWY3NWE3ODdmNmYzMWUxM2Q1YmE0OTBjYWM1YWRkYjZkYjFlMmZiZDc2MjZlYzQwMWZmNGM4MDI1YjYyNg==';
    // ODcwMWY3NWE3ODdmNmYzMWUxM2Q1YmE0OTBjYWM1YWRkYjZkYjFlMmZiZDc2MjZlYzQwMWZmNGM4MDI1YjYyNg==
    
    public static function send($recepients, $message)
    {
        $api_key='252d113e8d925e8c';
        $secret_key = 'ODcwMWY3NWE3ODdmNmYzMWUxM2Q1YmE0OTBjYWM1YWRkYjZkYjFlMmZiZDc2MjZlYzQwMWZmNGM4MDI1YjYyNg==';
        $postData = array(
            'source_addr' => 'INFO',
            'encoding'=>0,
            'schedule_time' => '',
            'message' => $message,
            'recipients' => $recepients
            // 'recipients' => [array('recipient_id' => '1','dest_addr'=>'255700000001'),array('recipient_id' => '2','dest_addr'=>'255700000011')]
        );

        $Url ='https://apisms.beem.africa/v1/send';
        $ch = curl_init($Url);  
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));

        $response = curl_exec($ch);
        if($response === FALSE){
                echo $response;
            die(curl_error($ch));
        }
        var_dump($response);
    }
}
