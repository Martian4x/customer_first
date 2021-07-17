<?php

namespace App\Http\Controllers;
use Input;
use Redirect;
use App\Product;
use App\Order;
use App\Maincategory;
use App\Subcategory;
use App\Cart;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request as Request2;

class FrontendController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['only' => ['add_to_cart']]);
    }

    // Search the site for products
    public function search()
    {
        $vars['title'] = 'Seach Results';
        $vars['sub_title'] = Request2::get('q');
        $term = Request2::get('q');
        $vars['q'] = Request2::get('q');
        $vars['type'] = Request2::get('type');
        $type = Request2::get('type');

        if(isset($vars['type'])&&$vars['type']!='All'){
            $vars['products'] = $term? Product::whereHas('subcategory', function($query) use($term) {
                $query->where('name', 'like', '%'.$term.'%');
            })->orWhere('name','LIKE','%'.$term.'%')->whereType($type)->paginate(25):Product::paginate(25);
        }else{
            $vars['products'] = $term? Product::whereHas('subcategory', function($query) use($term) {
                $query->where('name', 'like', '%'.$term.'%');
            })->orWhere('name','LIKE','%'.$term.'%')->paginate(25):Product::paginate(25);
        }

        return view('frontend.products.list', compact('vars', $vars));
    }

    public function sms_received()
    {
        $last_sms = \App\TwoWaySms::latest()->first();
        $message = $last_sms->message;
        // dd($last_sms->message);
        if (strpos(strtolower($message), 'order') !== false) {
            if (strpos(strtolower($message), 'received') !== false){
                preg_match_all('!\d+!', $message, $matches);
                $id = (int)$matches[0][0];
                // dd($id);
                $order = \App\Order::find($id);
                $order->update(['status'=>'Delivered']);
            }
        }
        // CUSTOMER ORDER 
    }

    public function maincategory($maincategory_slug)
    {

        $maincategory = Maincategory::whereSlug($maincategory_slug)->first();
        if($maincategory == null){
            return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
        }
        $vars['title'] = $maincategory->name;
        $vars['sub_title'] = 'Products list';
        $vars['maincategory'] = $maincategory;
        $vars['products'] = $maincategory->products()->paginate(15);
        // dd($maincategory);

        return view('frontend.products.list', compact('vars',$vars));
    }

    public function subcategory($maincategory_slug, $subcategory_slug)
    {

        $maincategory = Maincategory::whereSlug($maincategory_slug)->first();
        $subcategory = Subcategory::whereSlug($subcategory_slug)->first();
        if($maincategory == null){
            return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
        }
        $vars['title'] = $subcategory->name;
        $vars['sub_title'] = 'Products list';
        $vars['maincategory'] = $maincategory;
        $vars['subcategory'] = $subcategory;
        $vars['products'] = $subcategory->products()->paginate(15);
        // dd($maincategory);

        return view('frontend.products.list', compact('vars',$vars));
    }

    public function products()
    {
        $products = Product::all();
        if($product == null){
            return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
        }
        $vars['title'] = $product->title;
        $vars['sub_title'] = 'Product details';
        $vars['product'] = $product;
        $vars['products'] = $product->maincategory->products->take(6);

        // dd($vars['products']);
        return view('frontend.products.index', compact('vars',$vars));
    }

    public function cart_list()
    {
        if(\Auth::user()){
            $vars['cart_list'] = \Auth::user()->carts;
        }else{
            $vars['cart_list'] = Cart::whereUserId(null)->get();
        }
        $vars['title'] = 'Cart';
        $vars['sub_title'] = 'Products list';
        return view('frontend.orders.cart_list', compact('vars',$vars));
    }

    public function check_out()
    {
        $vars['cart_list'] = \Auth::user()->carts;

        $one_cart = $vars['cart_list']->first();

        if($one_cart->order_id==null){
            // It means no order yet
            $vars['title'] = 'Order';
            $vars['sub_title'] = 'Billing Address';
            return view('frontend.orders.billing_address', compact('vars',$vars));
        }elseif(Order::whereUserId(\Auth::id())->whereOrderStatus('Order')->get()){
            // dd('die');
            $vars['title'] = 'Payment';
            $vars['sub_title'] = 'Make order payments';
            return view('frontend.orders.payments', compact('vars',$vars));
        }
    }

    public function show_product($id)
    {
		$product = Product::with('photos')->whereSlug($id)->first();
        if($product == null){
            $product = Product::find($id);
        }
        if($product == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
        }
		$vars['title'] = $product->title;
    	$vars['sub_title'] = 'Product details';
    	$vars['product'] = $product;
    	$vars['products'] = $product->maincategory->products->take(6);

    	// dd($vars['product']);
        return view('frontend.products.show', compact('vars',$vars));
    }

    public function order_now(Request $request)
    {
        $input = $request->all();
        return $input;
    }

    public function add_to_cart()
    {
        $cart = new Cart;
        $response = new Response('Hello World');
        $cart->product_id = Input::get('product_id');
        $cart->quantity = Input::get('quantity');

        // $response->withCookie('product_id', $cart->product_id);

            // Cookie::forever('product_id', $cart->product_id);
            // Cookie::forever('quantity', $cart->quantity);
        // if(\Auth::guest()){
        // }else
        if (!\Auth::guest()) {
            $cart->user_id = \Auth::id();
            $cart->save();
        }
        return \Response::json('received', 200);
    }

    public function about_us()
    {
        return view('frontend.pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function exporting_importing()
    {
        return view('frontend.pages.exporting_importing');
    }

    public function faq()
    {
        return view('frontend.pages.faq');
    }

    public function help()
    {
        return view('frontend.pages.help');
    }

    public function payment_info()
    {
        return view('frontend.pages.payment_info');
    }

    public function sellers()
    {
        return view('frontend.pages.sellers');
    }

    public function privacy_policy()
    {
        return view('frontend.pages.privacy');
    }

    public function tos()
    {
		return view('frontend.pages.tos');
    }

    public function consultation()
    {
        return view('frontend.pages.consultation');
    }

    public function training()
    {
        return view('frontend.pages.training');
    }
}
