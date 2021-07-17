<?php

namespace App\Http\Controllers;
use App\Product;
use App\Order;
use App\Reward;
use App\User;
use Validator;
use Input;
use Redirect;
use Carbon\Carbon;
use App\Http\Requests\OrderRequest;
use App\Http\Requests as Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Request2;

class RewardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{	
		if(\Auth::user()->role == 'Admin'||\Auth::user()->role == 'Staff'){
			$vars['rewards'] = Order::paginate(30);
			$vars['sub_title'] = 'All rewards in the system';
		}
		elseif(\Auth::user()->role == 'Supplier'||\Auth::user()->role == 'Supplier_Staff'){
         $vars['supplier'] = \Auth::user()->supplier;
			$vars['supplier_customers'] = \Auth::user()->supplier->customers;
         $vars['sub_title'] = 'Customers Rewards';
			// dd($vars['supplier']);
			$vars['rewards'] = Reward::whereSupplierId($vars['supplier']->id)->paginate(30);
		}else{
         return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
		$vars['title'] = 'Rewards';
		return view('manage.rewards.index', compact('vars'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
	  $vars['supplier'] = \App\Supplier::whereUserId(\Auth::id())->first();
	  $vars['supplier_customers'] = $vars['supplier']->customers()->get();
	  $vars['supplier_couriers'] = $vars['supplier']->couriers()->get();
	  $vars['supplier_products'] = $vars['supplier']->products()->get();
	  // $vars['supplier'] = $supplier->id;
	  $vars['title'] = 'rewards';
	  $vars['sub_title'] = 'Add an order';
	  return view('manage.rewards.create', compact('vars'));
	}

	public function status($status)
	{	
		// dd($status);
		if(\Auth::user()->role == 'Admin'||\Auth::user()->role == 'Staff'){
			$vars['rewards'] = Order::whererewardstatus($status)->paginate(30);
			$vars['sub_title'] = ucfirst($status).' rewards';
		}
		elseif(\Auth::user()->role == 'Supplier'||\Auth::user()->role == 'Supplier_Staff'){
			$vars['supplier'] = \Auth::user()->supplier;
			// dd($vars['supplier']);
			$vars['rewards'] = Order::whereSupplierId($vars['supplier']->id)->whererewardstatus($status)->paginate(30);
			$vars['sub_title'] = ucfirst($status).' rewards';
		}else{
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
		$vars['title'] = 'rewards';
		return view('manage.rewards.index', compact('vars'));
	}

   public function store(Request $request)
   {
    	$input = $request->all();
    	$order = Order::latest()->select('id')->first();
       $input['type'] = 'AirTime';
       $input['name'] = 'AirTime Reward';
       $input['supplier_id'] = \Auth::user()->supplier->id;
      //  dd($input); 
      $reward = Reward::create($input);
      $customer = \App\User::find($reward->customer_id);

      if($customer&&$reward&&$reward->type=='AirTime'){
         // Send Airtime
         $data['dest_addr'] = preg_replace('/^(?:\+?255|0)?/','255', $customer->mob_no) ;
         $data['amount'] = number_format($reward->amount);
         $data['reference_id'] = $reward->id;
         // dd($data);
         $feeback = \App\Reward::send_airtime($data);
         $reward->update(['reference_id'=>$data['reference_id'],'feedback'=>json_encode($feeback)]);
         // dd($feeback);
         \App\SMS::send($customer->recipient(), $reward->message('rewarded_airtime'));
         return Redirect::back()->withMessage('Reward No:'. $data['reference_id'].' has been sent successful.')->with('flash_type', 'success');
      }
		// $input['user_id'] = \Auth::id();
		// $input['sub_total_price'] = Cart::subtotal(Cart::whereUserId($input['user_id'])->whereOrderId(null)->get());
    	// if($order==null){
    	// 	$input['order_no'] = 1;
    	// }else{
    	// 	$input['order_no'] = $order->id + 1;
    	// }
		// $order = Order::create($input);
		// $carts = Cart::whereUserId($input['user_id'])->update(['order_id'=>$order->id]);
		// return redirect('/check_out')->withMessage('Order No:'. $order->order_no.' has been received successful, Now you can proceed with payments.')->with('flash_type', 'success');
    }

}
