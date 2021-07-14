<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    protected $api_key='252d113e8d925e8c';
    protected $secret_key = 'ODcwMWY3NWE3ODdmNmYzMWUxM2Q1YmE0OTBjYWM1YWRkYjZkYjFlMmZiZDc2MjZlYzQwMWZmNGM4MDI1YjYyNg==';
    // ODcwMWY3NWE3ODdmNmYzMWUxM2Q1YmE0OTBjYWM1YWRkYjZkYjFlMmZiZDc2MjZlYzQwMWZmNGM4MDI1YjYyNg==
    
    public static function requstOTP($mob_no)
    {
        $api_key='252d113e8d925e8c';
        $secret_key = 'ODcwMWY3NWE3ODdmNmYzMWUxM2Q1YmE0OTBjYWM1YWRkYjZkYjFlMmZiZDc2MjZlYzQwMWZmNGM4MDI1YjYyNg==';
        $app_id = '193';
        // The data to send to the API
         $postData = array(
            'appId' => $app_id,
            'msisdn' => $mob_no,
         );

         $Url ='https://apiotp.beem.africa/v1/request';

         // Setup cURL
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

         // Send the request
         $response = curl_exec($ch);

         // Check for errors
         if($response === FALSE){
               echo $response;

            die(curl_error($ch));
         }
         return $response;
         // var_dump($response);
    }

    
    public static function verifyOTP($otp, $pin_id)
    {
        $api_key='252d113e8d925e8c';
        $secret_key = 'ODcwMWY3NWE3ODdmNmYzMWUxM2Q1YmE0OTBjYWM1YWRkYjZkYjFlMmZiZDc2MjZlYzQwMWZmNGM4MDI1YjYyNg==';
        $app_id = '193';
        $postData = array(
               'pinId' => $pin_id,
               'pin' => $otp,
         );
         
         $Url ='https://apiotp.beem.africa/v1/verify';
         
         // Setup cURL
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
         
         // Send the request
         $response = curl_exec($ch);
         
         // Check for errors
         if($response === FALSE){
                  echo $response;
         
               die(curl_error($ch));
         }
         return $response;
         // var_dump($response);
    }
}
