<?php

namespace App\Http\Controllers;
use App\Product;
use App\Order;
use App\Cart;
use App\User;
use Validator;
use Input;
use Image;
use Redirect;
use DB;
use Carbon\Carbon;
use App\Http\Requests\OrderRequest;
use App\Http\Requests as Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Request2;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{	
		if(\Auth::user()->role == 'Admin'||\Auth::user()->role == 'Staff'){
			$vars['orders'] = Order::paginate(30);
			$vars['sub_title'] = 'All orders in the system';
		}
		elseif(\Auth::user()->role == 'Supplier'||\Auth::user()->role == 'Supplier_Staff'){
			$vars['supplier'] = \Auth::user()->supplier;
			// dd($vars['supplier']);
			$vars['orders'] = Order::whereSupplierId($vars['supplier']->id)->paginate(30);
			$vars['sub_title'] = 'All your orders';
		}else{
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
		$vars['title'] = 'Orders';
		return view('manage.orders.index', compact('vars'));
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
	  $vars['title'] = 'Orders';
	  $vars['sub_title'] = 'Add an order';
	  return view('manage.orders.create', compact('vars'));
	}

	public function status($status)
	{	
		if(\Auth::user()->role == 'Admin'||\Auth::user()->role == 'Staff'){
			$vars['orders'] = Order::whereOrderStatus($status)->paginate(30);
			$vars['sub_title'] = ucfirst($status).' orders';
		}
		elseif(\Auth::user()->role == 'Supplier'||\Auth::user()->role == 'Supplier_Staff'){
			$vars['supplier'] = \Auth::user()->supplier;
			// dd($vars['supplier']);
			$vars['orders'] = Order::whereSupplierId($vars['supplier']->id)->whereOrderStatus($status)->paginate(30);
			$vars['sub_title'] = ucfirst($status).' orders';
		}else{
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
		$vars['title'] = 'Orders';
		return view('manage.orders.index', compact('vars'));
	}

   public function store(OrderRequest $request)
   {
    	$input = $request->all();
    	$order = Order::latest()->select('id')->first();
    	// dd($order->id); 
		$input['user_id'] = \Auth::id();
		$input['sub_total_price'] = Cart::subtotal(Cart::whereUserId($input['user_id'])->whereOrderId(null)->get());
    	if($order==null){
    		$input['order_no'] = 1;
    	}else{
    		$input['order_no'] = $order->id + 1;
    	}
		$order = Order::create($input);
		$carts = Cart::whereUserId($input['user_id'])->update(['order_id'=>$order->id]);
		return redirect('/check_out')->withMessage('Order No:'. $order->order_no.' has been received successful, Now you can proceed with payments.')->with('flash_type', 'success');
    }

   public function supplier_store(OrderRequest $request)
   {
    	$input = $request->all();
    	dd($input); 
		 $input['user_id'] = $input['customer_id'];
		 $input['supplier_id'] = \Auth::id();
		//  $input['sub_total_price'] = Cart::subtotal(Cart::whereUserId($input['user_id'])->whereOrderId(null)->get());
		 $input['sub_total_price'] = Cart::subtotal(Cart::whereUserId($input['user_id'])->whereOrderId(null)->get());
    	$order = Order::create($input);
		$input['order_id'] = $order->id;
		$cart = Cart::create($input);
		$carts = Cart::whereUserId($input['user_id'])->update(['order_id'=>$order->id]);

		// Send SMS 
		
		return redirect('/check_out')->withMessage('Order No:'. $order->order_no.' has been received successful, Now you can proceed with payments.')->with('flash_type', 'success');
    }
}
