<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{   
    public static function send($recepients, $message)
    {
        $config = \App\Configuration::first();
        $api_key = $config->sms_api_key;
        $secret_key = $config->sms_secret_key;

        $postData = array(
            'source_addr' => 'INFO',
            'encoding'=>0,
            'schedule_time' => '',
            'message' => $message,
            'recipients' => $recepients
            // 'recipients' => [array('recipient_id' => '1','dest_addr'=>'255700000001'),array('recipient_id' => '2','dest_addr'=>'255700000011')]
        );

        // return $postData;

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
        return $response;
        // var_dump($response);
    }

    public static function balance()
    {
        $config = \App\Configuration::first();
        $api_key = $config->sms_api_key;
        $secret_key = $config->sms_secret_key;
        $username = $api_key;
        $password = $secret_key;
        $Url ='https://apisms.beem.africa/public/v1/vendors/balance';
        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($ch, array(
            CURLOPT_HTTPGET => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization:Basic ' . base64_encode("$username:$password"),
                'Content-Type: application/json'
            ),
        ));
        // Send the request
        $response = curl_exec($ch);
        if($response === FALSE){
                echo $response;
            die(curl_error($ch));
        }
        return $response;
    }

    // Enter an array 
   public static function send_to_list($mob_no_array, $message)
   {
      $recepients = [];
      $recepients_list = $mob_no_array;
      foreach($recepients_list as $key=>$mob_no){
         $recepient = [];
         $id = $key=1;
         $recepient['recipient_id'] = (string)$id;
         $recepient['dest_addr'] = preg_replace('/^(?:\+?255|0)?/','255', $mob_no);
         $recepients[] = $recepient;
      }

      $feedback = self::send($recepients, $message);  
      // unserialize($recepients);
      $sms_request = \App\SmsSendRequest::create(['user_id'=>\Auth::id(),'recepients'=>serialize($recepients),'message'=>$message]);
      // Save Request;
		if($feedback){
         if($sms_request){
            $sms_request->update(['json_feedback'=>json_encode($feedback)]);
         }
         return $feedback;
		}
		return false;
   }

}
