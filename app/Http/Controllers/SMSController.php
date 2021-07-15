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
