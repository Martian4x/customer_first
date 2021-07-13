<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use App\Maincategory;
use Validator;
use Input;
use Image;
use Redirect;
use DB;
use Carbon\Carbon;
use App\Http\Requests\ProductRequest;
use App\Http\Requests as Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Request2;

class TypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function register()
    {
    	$vars['countries'] = User::countries_list();
        $vars['title'] = 'product';
        $vars['sub_title'] = 'Add a product';
        return view('auth.product_register', compact('vars'));
    }

	public function index()
	{	
		if(\Auth::user()->role == 'Admin'||\Auth::user()->role == 'Staff'){
			$vars['products'] = Product::paginate(15);
			$vars['sub_title'] = 'All products in the system';
		}
		elseif(\Auth::user()->role == 'Supplier'){
			$vars['products'] = \Auth::user()->products->paginate(15);
			$vars['sub_title'] = 'All your products';
		}else{
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
		$vars['title'] = 'Products';
		return view('manage.products.index', compact('vars'));
	}    

	// Search the products table
    public function search()
    {
        $vars['title'] = 'Seach Results';
        $vars['sub_title'] = Request2::get('q');
        $term = Request2::get('q');
        $vars['q'] = Request2::get('q');

        $vars['products'] = $term? Product::whereHas('maincategory', function($query) use($term) {
		    $query->where('name', 'like', '%'.$term.'%');
		})->orWhere('name','LIKE','%'.$term.'%')->orderBy('status', 'asc')->paginate(25):Product::paginate(25);

        // dd($vars['products']);

        return view('manage.products.index', compact('vars', $vars));
    }

    //Browse by type
	public function type($type)
	{
		$vars['maincategories'] = Maincategory::whereType($type)->get();

		// dd($vars['maincategories']);
		$vars['title'] = $type;
    	$vars['sub_title'] = ucfirst($type).' main products categories';
		return view('manage.maincategories.index', compact('vars'));
	}

    public function create()
    {
        $vars['title'] = 'Product';
        $vars['sub_title'] = 'Add a product';
        return view('manage.products.create', compact('vars'));
    }

    public function store(ProductRequest $request)
    {
    	$input = $request->all();

    	// dd(extract($request->product_country));

		if(Input::file('product_img')!=null){
			$time = time();
			$file = Input::file('product_img');
			$file_name = $time.'_'.$file->getClientOriginalName();
			$image = Image::make($file);
			$cover_path = public_path().'/logos/';
			$thumb_path = public_path().'/thumbnails/';

			$image->save($cover_path.$file_name);
			$image->resize(250,190);
			$image->save($thumb_path.$file_name);
			$input['product_img'] = $file_name;
			$input['product_img_url'] = $cover_path.$file_name;
		}
		//User password
		$input['password'] = password_hash(Input::get('password'), PASSWORD_BCRYPT, ['cost' => 10]);
		// Saving the model
		$user = User::create($input);
		$product = $user->product()->create($input);
		return Redirect::route('manage.products.show', $product->id)->withMessage($product->company_name.' is added successful')->with('flash_type', 'success');
    }

	public function show($id)
	{
		$product = Product::find($id);
		if($product == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
		}
		$vars['title'] = $product->title;
    	$vars['sub_title'] = 'product details';
    	$vars['product'] = $product;
		return view('manage.products.show', compact('vars',$product));
	}	

	public function verify($id)
	{
		$product = Product::find($id);
		if($product->product_verified=='No'){
			$product->product_verified='Yes';
		}elseif($product->product_verified=='Yes'){
			$product->product_verified='No';
		}else{
			$product->product_verified='No';
		}
		$product->update();
		return Redirect::back()->withMessage('product data verification status changed to '.$product->product_verified.'.. !')->with('flash_type', 'success');
	}

	public function edit($id)
	{
    	$vars['countries'] = User::countries_list();
		$product = Product::find($id);
		if(\Auth::user()->role!='Admin'||\Auth::user()->role!='Staff'){
			$product = \Auth::user()->product;
		}
		if($product == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
		}
		$vars['title'] = $product->company_name;
    	$vars['sub_title'] = 'Edit product details';
    	$vars['product'] = $product;
		return view('manage.products.edit', compact('vars'));
	}


	public function update($id, ProductRequest $request)
	{
		$product = Product::findorFail($id);
		if($product == null){
			return Redirect::back()->withMessage('What you request does not exist..');
		}
	
		$input = $request->all();

		if(Input::file('product_img')!=null){
			$time = time();
			$file = Input::file('product_img');
			$file_name = $time.'_'.$file->getClientOriginalName();
			$image = Image::make($file);
			$cover_path = public_path().'/logos/';
			$thumb_path = public_path().'/thumbnails/';

			$image->save($cover_path.$file_name);
			$image->resize(250,190);
			$image->save($thumb_path.$file_name);
			$input['product_img'] = $file_name;
			$input['product_img_url'] = $cover_path.$file_name;
		}
		// if(\Auth::user()->role =='Admin'||\Auth::user()->role =='Staff'){
		// 	$input['status'] = 'Publish';
		// }

		$product->update($input);
		return Redirect::route('manage.products.show', $id)->withMessage($product->company_name.' is updated successful')->with('flash_type', 'success');
	}


    public function destroy($id)
    {
    	
		if(\Auth::user()->role != 'Admin'){
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
        $product = Product::findorFail($id)->delete();
        return \Response::Json('Delete Success', 200);
        // return Redirect::back()->withMessage('Tariff has been deleted..')->with('flash_type', 'success');
    }
}
