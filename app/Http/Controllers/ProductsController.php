<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use App\Agriculture;
use App\Clothing;
use App\Craft;
use App\Electronic;
use App\Mineral;
use App\Textile;
use App\Manufacturing;
use App\Supplier;
use App\Maincategory;
use App\Subcategory;
use Validator;
use Input;
use Image;
use Redirect;
use DB;
use Carbon\Carbon;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\PhotoRequest;
use App\Http\Requests as Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Request2;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{	
		if(\Auth::user()->role == 'Admin'||\Auth::user()->role == 'Staff'){
			$vars['products'] = Product::paginate(30);
			$vars['sub_title'] = 'All products in the system';
		}
		elseif(\Auth::user()->role == 'Supplier'){
			$vars['supplier'] = \Auth::user()->supplier;
			// dd($vars['supplier']);
			$vars['products'] = Product::whereSupplierId($vars['supplier']->id)->paginate(30);
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
		})->orWhere('name','LIKE','%'.$term.'%')->orWhere('badge','LIKE','%'.$term.'%')->orWhere('status','LIKE','%'.$term.'%')->orderBy('status', 'asc')->paginate(25):Product::paginate(25);

        // dd($vars['products']);

        return view('manage.products.index', compact('vars', $vars));
    }

    //Browse by type
	public function type($type)
	{
		if(\Auth::user()->role == 'Admin'||\Auth::user()->role == 'Staff'){
			$vars['products'] = Product::whereType($type)->paginate(30);
		}
		elseif(\Auth::user()->role == 'Supplier'){
			$vars['supplier'] = \Auth::user()->supplier;
			// dd($vars['supplier']);
			$vars['products'] = Product::whereSupplierId($vars['supplier']->id)->whereType($type)->paginate(30);
		}else{
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}

		// dd($vars['maincategories']);
		$vars['title'] = 'Products';
    	$vars['sub_title'] = ucfirst($type).' type products';
		return view('manage.products.index', compact('vars'));
	}

	// Product badge update
	public function badge_update(ProductRequest $request)
	{
		if($request->id==null){
			return Redirect::back()->withMessage('select a product first.. !')->with('flash_type', 'error');
		}
		$products_ids = array_values($request->id);
		Product::whereIn('id', $products_ids)->update(['badge' => $request->badge]);
		return Redirect::back()->withMessage('products status label updated successful.. !')->with('flash_type', 'success');
	}

	public function photo_store(PhotoRequest $request)
	{
    	$input = $request->all();
    	// dd(Input::all());
		if(Input::file('img')!=null){
			// dd('ues');
			$time = time();
			$file = Input::file('img');
			$file_name = $time.'_'.$file->getClientOriginalName();
			$image = Image::make($file);
			$original_path = public_path().'/assets/img/products/original/';
			$thumb_180_path = public_path().'/assets/img/products/180x180/';
			$thumb_200_path = public_path().'/assets/img/products/200x200/';
			$thumb_262_path = public_path().'/assets/img/products/262x323/';
			$thumb_550_path = public_path().'/assets/img/products/550x825/';
			$thumb_973_path = public_path().'/assets/img/products/973x615/';

			$image->save($original_path.$file_name);

			$image->resize(973,615);
			$image->save($thumb_973_path.$file_name);
			$image->resize(550,825);
			$image->save($thumb_550_path.$file_name);
			$image->resize(262,323);
			$image->save($thumb_262_path.$file_name);
			$image->resize(200,200);
			$image->save($thumb_200_path.$file_name);
			$image->resize(180,180);
			$image->save($thumb_180_path.$file_name);

			$input['filename'] = $file_name;
			$input['original_name'] = $file->getClientOriginalName();
			$input['url'] = $original_path.$file_name;
			$input['title'] = $file->getClientOriginalName();
		}
		// Saving the model
		$product = Product::findorFail($input['product_id']);
		$photo = $product->photos()->create($input);

		return Redirect::back()->withMessage($photo->original_name.' uploaded successful')->with('flash_type', 'success');
	}

    //Browse by status
	public function status($status)
	{
		$vars['products'] = Product::whereproductStatus($status)->paginate(30);
		$vars['title'] = 'products';
    	$vars['sub_title'] = ucfirst($status).' products';
		return view('manage.products.index', compact('vars'));
	}

    public function create($id) // Supplier id
    {
    	if(\Auth::user()->role=='Admin'||\Auth::user()->role == 'Staff'){
    		$vars['supplier'] = Supplier::find($id);
    		if(!$vars['supplier']){
			return Redirect::back()->withMessage('The Supplier you are looking for is not found..!')->with('flash_type', 'error');
			}
    	}elseif(\Auth::user()->role=='Supplier'){
    		$vars['supplier'] = \Auth::user()->supplier;
    	}else{
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
    	}
    	// $vars['countries'] = User::countries_list();
    	$vars['types'] = Product::types();
        // $vars['maincategories'] = Maincategory::lists('name', 'id')->toArray();
        // $vars['subcategories'] = Subcategory::lists('name', 'id')->toArray();
        // dd($vars['countries']);
        $vars['title'] = 'Product';
        $vars['sub_title'] = 'Add a product';
        return view('manage.products.create', compact('vars'));
    }

    public function store(ProductRequest $request)
    {
    	$input = $request->all();

    	// dd(Input::all());
		if(Input::file('img')!=null){
			// dd('ues');
			$time = time();
			$file = Input::file('img');
			$file_name = $time.'_'.$file->getClientOriginalName();
			$image = Image::make($file);
			$original_path = public_path().'/assets/img/products/original/';
			$thumb_180_path = public_path().'/assets/img/products/180x180/';
			$thumb_200_path = public_path().'/assets/img/products/200x200/';
			$thumb_262_path = public_path().'/assets/img/products/262x323/';
			$thumb_550_path = public_path().'/assets/img/products/550x825/';
			$thumb_973_path = public_path().'/assets/img/products/973x615/';

			$image->save($original_path.$file_name);

			$image->resize(973,615);
			$image->save($thumb_973_path.$file_name);
			$image->resize(550,825);
			$image->save($thumb_550_path.$file_name);
			$image->resize(262,323);
			$image->save($thumb_262_path.$file_name);
			$image->resize(200,200);
			$image->save($thumb_200_path.$file_name);
			$image->resize(180,180);
			$image->save($thumb_180_path.$file_name);

			$input['product_img'] = $file_name;
			$input['product_img_url'] = $original_path.$file_name;
		}
		// Saving the model
		$input['entered_by_id'] = \Auth::id();
		$supplier = Supplier::findorFail($input['supplier_id']);
		$product = $supplier->products()->create($input);
		$input['product_id'] =$product->id;

		// Creating products specification
		if($input['type']=='Agriculture'){
			$details = Agriculture::create($input);
		}elseif($input['type']=='Clothing'){
			$details = Clothing::create($input);
		}elseif($input['type']=='Craft'){
			$details = Craft::create($input);
		}elseif($input['type']=='Electronic'){
			$details = Electronic::create($input);
		}elseif($input['type']=='Manufacturing'){
			$details = Manufacturing::create($input);
		}elseif($input['type']=='Mineral'){
			$details = Mineral::create($input);
		}elseif($input['type']=='Textile'){
			$details = Textile::create($input);
		}
		// Notifiy Customers
      if($input['notify_customer_by_sms']==true){
			$customer_numbers = $supplier->customers()->pluck('mob_no')->toArray();
			// dd($customer_numbers);
			\App\SMS::send_to_list($customer_numbers, $product->message('new_product'));
		}
		return Redirect::back()->withMessage($product->name.' added successful')->with('flash_type', 'success');
    }

	public function photos($id) // Product id
	{
		$product = Product::find($id);
		if($product == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
		}
		$vars['title'] = $product->title;
    	$vars['sub_title'] = 'Product photos';
    	$vars['product'] = $product;
    	$vars['photos'] = $product->photos;
		return view('manage.products.photos', compact('vars',$product));
	}

	public function show($id)
	{
		$product = Product::find($id);
		if($product == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
		}
		$vars['title'] = $product->title;
    	$vars['sub_title'] = 'Product details';
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
		$vars['maincategories'] = Maincategory::lists('name', 'id')->toArray();
        $vars['subcategories'] = Subcategory::lists('name', 'id')->toArray();
    	$vars['countries'] = User::countries_list();
    	$vars['types'] = Product::types();
		// dd($product);
		if(\Auth::user()->role=='Admin'||\Auth::user()->role=='Staff'){
			$product = Product::find($id);
		}else{
			$product = Product::whereSupplierId(\Auth::user()->supplier->id)->whereId($id)->first();
		}
		if(!$product){
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


		if(Input::file('img')!=null){
			// dd('ues');
			$time = time();
			$file = Input::file('img');
			$file_name = $time.'_'.$file->getClientOriginalName();
			$image = Image::make($file);
			$original_path = public_path().'/assets/img/products/original/';
			$thumb_180_path = public_path().'/assets/img/products/180x180/';
			$thumb_200_path = public_path().'/assets/img/products/200x200/';
			$thumb_262_path = public_path().'/assets/img/products/262x323/';
			$thumb_550_path = public_path().'/assets/img/products/550x825/';
			$thumb_973_path = public_path().'/assets/img/products/973x615/';

			$image->save($original_path.$file_name);

			$image->resize(973,615);
			$image->save($thumb_973_path.$file_name);
			$image->resize(550,825);
			$image->save($thumb_550_path.$file_name);
			$image->resize(262,323);
			$image->save($thumb_262_path.$file_name);
			$image->resize(200,200);
			$image->save($thumb_200_path.$file_name);
			$image->resize(180,180);
			$image->save($thumb_180_path.$file_name);

			$input['product_img'] = $file_name;
			$input['product_img_url'] = $original_path.$file_name;
		}

		// dd($input);
		$product->update($input);
		return Redirect::route('manage.products.show', $id)->withMessage($product->name.' is updated successful')->with('flash_type', 'success');
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
