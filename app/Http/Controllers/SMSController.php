<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Supplier;
use App\Customer;
use Validator;
use Input;
use Redirect;
use Carbon\Carbon;
use App\Http\Requests as Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Request2; 

class SMSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function dashboard()
	{
		$supplier = Supplier::whereUserId(\Auth::id())->first();
      if(!$supplier){
         return Redirect::back()->withMessage('Not found.!')->with('flash_type', 'error');
      }
		
		$vars['title'] = 'SMS';
		$vars['supplier'] = $supplier;
		$vars['sub_title'] = 'SMS Management';
      // dd($vars);
		// $vars['users'] = User::all();
		return view('manage.messages.dashboard', compact('vars'));
	}

	public function check_balance(Request $request)
	{
      $feedback = \App\SMS::balance();
		if($feedback){
			return $feedback;
		}
		// 
		return false;
	}

	public function send_bulk(Request $request)
	{
      $input = $request->all();

      if(isset($input['body'])){
         $message = $input['body'];
      }
      
      $recepients = [];
      $recepients_list = \App\User::whereIn('id', array_values($input['recepients']))->pluck('mob_no')->toArray();
      foreach($recepients_list as $key=>$mob_no){
         $recepient = [];
         $id = $key=1;
         $recepient['recipient_id'] = (string)$id;
         $recepient['dest_addr'] = preg_replace('/^(?:\+?255|0)?/','255', $mob_no);
         $recepients[] = $recepient;
      }
      // $recepients = [$recepients;
      // dd('die');
      // return [$recepients];
      // $recepients = [['recipient_id' => '1','dest_addr'=>'255756056007'],array('recipient_id' => '2','dest_addr'=>'255625595618')];
      // return $recepients;

      $feedback = \App\SMS::send($recepients, $message);  
      // unserialize($recepients);
      $sms_request = \App\SmsSendRequest::create(['user_id'=>\Auth::id(),'recepients'=>serialize($recepients),'message'=>$message]);
      // Save Request;
		if($feedback){
         if($sms_request){
            $sms_request->update(['json_feedback'=>json_encode($feedback)]);
         }
         return $feedback;
		}
		// 
		return false;
	}

    public function destroy($id)
    {
		if(\Auth::user()->role != 'Admin'){
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
        $user = User::findorFail($id)->delete();
        return \Response::Json('Delete Success', 200);
        // return Redirect::back()->withMessage('Tariff has been deleted..')->with('flash_type', 'success');
    }
}
