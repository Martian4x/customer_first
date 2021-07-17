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
      
      // $config = \App\Configuration::first();
      // dd($config);
		$supplier = Supplier::whereUserId(\Auth::id())->first();
      if(!$supplier){
         return Redirect::back()->withMessage('Not found.!')->with('flash_type', 'error');
      }
		
		$vars['title'] = 'SMS';
		$vars['supplier'] = $supplier;
		$vars['sub_title'] = 'SMS Management';
      $vars['supplier_two_messages'] = \App\TwoWaySms::all();
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
      if(isset($input['body'])&&isset($input['recepients'])){
         $message = $input['body'];
         $mob_no_array = \App\User::whereIn('id', array_values($input['recepients']))->pluck('mob_no')->toArray();
         return \App\SMS::send_to_list($mob_no_array, $message);
      }
      return false;
	}

   public function two_way()
   {
       $data = file_get_contents('http://customer.martian4x.com/manage/sms/two_way_callback');
       $data = json_decode($data, true);
       $source_addr=$data['from'];
       $dest_addr=$data['to'];
       $channel=$data['channel'];
       $timestamp=$data['timeUTC'];
       $id=$data['transaction_id'];
       $message=$data['message'];
       $billing=$data['billing'];
       $res= array('transaction_id' => $id, 'successful'=> true);
       $json = json_encode($res);
       echo $json;
       // save to db
       $inbout_sms = \App\TwoWaySms::create($data);
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
