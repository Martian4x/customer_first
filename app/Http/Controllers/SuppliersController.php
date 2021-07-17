<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Supplier;
use Validator;
use Input;
use Image;
use Redirect;
// use DB;
use Carbon\Carbon;
use App\Http\Requests\SupplierRequest;
use App\Http\Requests as Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Request2;

class SuppliersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		// $this->middleware('auth', ['except' => ['register','store']]);
		// $this->middleware(['admin','staff'], ['only' => 'index','destroy','search','status','verify']);
	// $this->middleware('supplier', ['except' => ['register','store']]);
	}

	public function register()
	{
	$vars['countries'] = User::countries_list();
		$vars['title'] = 'Supplier';
		$vars['sub_title'] = 'Create a supplier account';
		return view('auth.supplier_register', compact('vars'));
	}

	public function dashboard()
	{
	
	}

	public function customers($id)
	{	
		if(\Auth::user()->role != 'Admin' && \Auth::user()->role != 'Staff' && \Auth::user()->role != 'Supplier'){
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
		$supplier = Supplier::whereUserId(\Auth::id())->first();
		$vars['title'] = 'Customers';
		$vars['sub_title'] = $supplier->company_name.'\'s Customers';
		$vars['users'] = $supplier->customers;
		$vars['supplier'] = $supplier;
		// dd($vars);
		return view('manage.customers.index', compact('vars'));
	}

	public function couriers($id)
	{	
		
		// dd('die');
		if(\Auth::user()->role != 'Admin' && \Auth::user()->role != 'Staff' && \Auth::user()->role != 'Supplier'){
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
		$supplier = Supplier::whereUserId(\Auth::id())->first();
		$vars['title'] = 'couriers';
		$vars['sub_title'] = $supplier->company_name.'\'s couriers';
		$vars['users'] = $supplier->couriers;
		// dd($vars);
		return view('manage.couriers.index', compact('vars'));
	}

	public function partners($id)
	{	
		// dd('die');
		if(\Auth::user()->role != 'Admin' && \Auth::user()->role != 'Staff' && \Auth::user()->role != 'Supplier'){
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
		$supplier = Supplier::whereUserId(\Auth::id())->first();
		$vars['title'] = 'Partners';
		$vars['sub_title'] = $supplier->company_name.'\'s partners';
		$vars['users'] = $supplier->partners;
		// dd($vars);
		return view('manage.partners.index', compact('vars'));
	}

	public function index()
	{	
		$vars['suppliers'] = Supplier::paginate(15);
		$vars['title'] = 'Suppliers';
        $vars['sub_title'] = 'All registered suppliers';
		return view('manage.suppliers.index', compact('vars'));
	}    

	// Search the suppliers table
    public function search()
    {
        $vars['title'] = 'Seach Results';
        $vars['sub_title'] = Request2::get('q');
        $term = Request2::get('q');
        $vars['q'] = Request2::get('q');

        $vars['suppliers'] = $term? Supplier::whereHas('user', function($query) use($term) {
		    $query->where('fname', 'like', '%'.$term.'%')->where('lname', 'like', '%'.$term.'%');
		})->orWhere('company_name','LIKE','%'.$term.'%')->orderBy('company_name', 'asc')->paginate(25):supplier::paginate(25);

        // dd($vars['suppliers']);

        return view('manage.suppliers.index', compact('vars', $vars));
    }

    //Browse by status
	public function status($status)
	{
		$vars['suppliers'] = Supplier::whereSupplierStatus($status)->paginate(30);
		$vars['title'] = 'Suppliers';
    	$vars['sub_title'] = ucfirst($status).' Suppliers';
		return view('manage.suppliers.index', compact('vars'));
	}

    public function store(SupplierRequest $request)
    {
    	$input = $request->all();

		if(Input::file('supplier_img')!=null){
			$time = time();
			$file = Input::file('supplier_img');
			$file_name = $time.'_'.$file->getClientOriginalName();
			$image = Image::make($file);
			$logo_path = public_path().'/logos/';
			$thumb_path = public_path().'/thumbnails/';

			$image->save($logo_path.$file_name);
			$image->resize(200,200);
			$image->save($thumb_path.$file_name);
			$input['supplier_img'] = $file_name;
			$input['supplier_img_url'] = $logo_path.$file_name;
		}
		//User password
		$input['password'] = password_hash(Input::get('password'), PASSWORD_BCRYPT, ['cost' => 10]);
		$input['role'] = 'Supplier';
		// Saving the model
		$user = User::create($input);
        auth()->login($user);
		$supplier = $user->supplier()->create($input);
		return Redirect::route('manage.suppliers.show', $supplier->id)->withMessage($supplier->company_name.' supplier account created successful')->with('flash_type', 'success');
    }

	public function show($id)
	{
		$supplier = Supplier::find($id);
		if(\Auth::user()->role!='Admin'||\Auth::user()->role!='Staff'){
			$supplier = \Auth::user()->supplier;
		}
		if($supplier == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
		}
		$vars['title'] = $supplier->title;
    	$vars['sub_title'] = 'Supplier details';
    	$vars['supplier'] = $supplier;
		return view('manage.suppliers.show', compact('vars',$supplier));
	}	

	public function verify($id)
	{
		$supplier = Supplier::find($id);
		if($supplier->supplier_verified=='No'){
			$supplier->supplier_verified='Yes';
		}elseif($supplier->supplier_verified=='Yes'){
			$supplier->supplier_verified='No';
		}else{
			$supplier->supplier_verified='No';
		}
		$supplier->update();
		return Redirect::back()->withMessage('Supplier data verification status changed to '.$supplier->supplier_verified.'.. !')->with('flash_type', 'success');
	}

	public function edit($id)
	{
    	$vars['countries'] = User::countries_list();
		$supplier = Supplier::find($id);
		if(\Auth::user()->role!='Admin'||\Auth::user()->role!='Staff'){
			$supplier = \Auth::user()->supplier;
		}
		if($supplier == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
		}
		$vars['title'] = $supplier->company_name;
    	$vars['sub_title'] = 'Edit supplier details';
    	$vars['supplier'] = $supplier;
		return view('manage.suppliers.edit', compact('vars'));
	}


	public function update($id, SupplierRequest $request)
	{
		$supplier = Supplier::findorFail($id);
		if(\Auth::user()->role!='Admin'||\Auth::user()->role!='Staff'){
			$supplier = \Auth::user()->supplier;
		}
		if($supplier == null){
			return Redirect::back()->withMessage('What you request does not exist..');
		}
	
		$input = $request->all();

		if(Input::file('supplier_img')!=null){
			$time = time();
			$file = Input::file('supplier_img');
			$file_name = $time.'_'.$file->getClientOriginalName();
			$image = Image::make($file);
			$cover_path = public_path().'/logos/';
			$thumb_path = public_path().'/thumbnails/';

			$image->save($cover_path.$file_name);
			$image->resize(250,190);
			$image->save($thumb_path.$file_name);
			$input['supplier_img'] = $file_name;
			$input['supplier_img_url'] = $cover_path.$file_name;
		}
		// if(\Auth::user()->role =='Admin'||\Auth::user()->role =='Staff'){
		// 	$input['status'] = 'Publish';
		// }

		$supplier->update($input);
		return Redirect::route('manage.suppliers.show', $id)->withMessage($supplier->company_name.' is updated successful')->with('flash_type', 'success');
	}


    public function destroy($id)
    {
        $supplier = Supplier::findorFail($id)->delete();
        return \Response::Json('Delete Success', 200);
        // return Redirect::back()->withMessage('Tariff has been deleted..')->with('flash_type', 'success');
    }

}
