<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Validator;
use Input;
use Redirect;
use DB;
use Carbon\Carbon;
use App\Http\Requests\UserRequest;
use App\Http\Requests as Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Request2; 

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{	
		if(\Auth::user()->role != 'Admin' && \Auth::user()->role != 'Staff'){
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
		
		$vars['title'] = 'Users';
		$vars['sub_title'] = 'All System Users';
		$vars['users'] = User::all();
		return view('manage.users.index', compact('vars'));
	}

	public function users_role($role) // Fetch user with role
	{	
		$vars['role'] = Role::whereName($role)->first();

		$vars['title'] = $vars['role']->display_name;

		$vars['users'] = $vars['role']->users;

		// dd($vars['users']);

		$vars['sub_title'] = $vars['role']->display_name.' Users';

		return view('manage.users.index', compact('vars'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vars['title'] = 'User';

        $vars['sub_title'] = 'Create a user';

        return view('manage.users.create', compact('vars'));
    }
   
	public function store(){
	$user = new User;

	$validator = Validator::make(Input::all(),
			[
		    'name' => 'required|string|between:2,50',
		    'email' => 'required|email|unique:users',
		    'username' => 'required|unique:users',
		    'role' => 'string',
	        'password' => 'required|min:5|confirmed',
	        'password_confirmation' => 'required|min:5',
			'img' => 'max:1000',
		    'address' => 'string|between:2,50',
		    'mob_no' => 'digits_between:0,12',
		    'status' => 'string',
            'terms' => 'required|in:true',
		    'description' => 'string'
			]
		);
		
		//test if inputs fails
		if($validator->fails()){
			$messages = $validator->messages();
			//return $messages;
			return Redirect::back()->withErrors($validator)->withInput()->withMessage('Change a few things up and try submitting again.!')->with('flash_type', 'error');
		} 

		// Profile Pic
		if(Input::file('img')){
				if(Input::file('img')){
				$file = Input::file('img');
				$name = time(). '-' . $file->getClientOriginalName();
				$user->img = $name;
				try {
				$file = $file->move(public_path().'/img/users/', $name);
				$user->img_url = public_path().'/img/users/'.$name;
				} catch (Exception $e) {
				return Redirect::back()->withMessage($e->getMessage());
				}
			}else{
				return Redirect::back()->withInput()->withMessage('Profile picture failed to upload, Try again..!')->with('flash_type', 'error');
			}
			if(file_exists($file)==false){
				return Redirect::back()->withInput()->withMessage('Profile picture failed to upload, Try Again..!')->with('flash_type', 'error');
			}
		}
		// name, mname, lname, email, role, password, company, img, img_url, address, mob_no, tel_no, gender, status, description
		$user->entered_by_id = \Auth::id();
		$user->name = Input::get('name');
		$user->username = Input::get('username');
		$user->lname = Input::get('lname');
		$user->email = Input::get('email');
		$user->role = 'User';
		if(\Auth::user()->role == 'Admin' || \Auth::user()->role == 'Staff'){
			$user->status = Input::get('status');
			$user->role = Input::get('role');
		}
		$user->password = password_hash(Input::get('password'), PASSWORD_BCRYPT, ['cost' => 10]);
		$user->address = Input::get('address');
		$user->mob_no = preg_replace('/^(?:\+?255|0)?/','255', Input::get('mob_no'));
		$user->status = 'Active';
		$user->description = Input::get('description');
		$user->save();
		return redirect('/manage/users')->withMessage($user->name.' '.$user->lname.' is registered successful')->with('flash_type', 'success');
	}

	public function profile()
	{
		$user = \Auth::user();
		$vars['title'] = $user->name.' '.$user->lname;
    	$vars['sub_title'] = 'Profile Details';
    	$vars['user'] = $user;
		return view('manage.users.show', compact('vars',$user));
	}

	public function request_otp(Request $request)
	{
		//User
		// return $request->user_id;
		$user = User::find($request->user_id);
		if($user){
			$feedback = \App\OTP::requstOTP($user->mob_no);
			\App\Otp_request::create(['user_id'=>$user->id,'json_feedback'=>$feedback]);
			return $feedback;
		}
		return false;
	}

	public function verify_mob_no(Request $request)
	{
		// $input = $request->all();
		// return $input;
		$user = User::find($request->user_id);
		// if($request->pin_id==null){
		// }
		if($user&&$request->pin_id!=null){
			$feedback = \App\OTP::verifyOTP($request->otp, $request->pin_id);
			\App\Otp_request::create(['user_id'=>$user->id,'json_feedback'=>$feedback]);
			$feedback = json_decode($feedback, true);
			if($feedback&&$feedback['data']['message']['code']==117){
				$user->update(['mob_no_verified'=>'Yes']);
			}
			return $feedback;
		}
		// 
		return false;
	}


	public function user_orders($id) // User id
	{
		// dd('die');
		if(\Auth::user()->role != 'Admin' && \Auth::user()->role != 'Staff'){
			$user = \Auth::user();
		}else{
			$user = User::find($id);
		}
		if($user == null){
			return Redirect::back()->withMessage('User not available, Please create an account or contact sellyou Management if there is a problem !')->with('flash_type', 'error');
			// return Redirect::back()->withMessage('You have no orders yet, Start shopping now !')->with('flash_type', 'error');
		}
    	$vars['sub_title'] = 'Orders list';
		$vars['title'] = $user->fname.' '.$user->lname;
    	$vars['user'] = $user;
    	$vars['orders'] = $user->orders()->paginate(30);
    	// $vars['products'] = $user->products()->paginate(15);
		return view('manage.orders.index', compact('vars',$user));
	}

	public function show($id)
	{
		$user = User::find($id);
		if($user == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
		}
    	$vars['sub_title'] = 'Profile Details';
		$vars['title'] = $user->fname.' '.$user->lname;
    	$vars['user'] = $user;
    	// $vars['products'] = $user->products()->paginate(15);
		return view('manage.users.show', compact('vars',$user));
	}

	public function edit($id)
	{
		if(\Auth::user()->role != 'Admin' && \Auth::user()->role != 'Staff'){
			$user = \Auth::user();
		}else{
			$user = User::find($id);	
		}
		if($user == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
		}
		$vars['title'] = $user->name.' '.$user->lname;
    	$vars['sub_title'] = 'Edit user';
    	$vars['user'] = $user;
		return view('manage.users.edit', compact('vars'));
	}

	public function checking_username()
	{
		// return Input::get('username');
		// return 'die';	
		// $data = 'yes';
		$data = 'data';
		return Response::json($data);

		return Response::json(Input::get('username'));
	    if (User::whereUsername(Input::get('username'))->exists()){
	        return Response::json(Input::get('username').' is already taken');
	    }else{
	        return Response::json(Input::get('username').' Username is available');
	    }
	}


	/*
	Update user data
	 */
	public function update($id, Request $request)
	{
		// dd($id);
		if(\Auth::user()->role == 'User'){
			$id = \Auth::user()->id;
		}
		$validator = Validator::make(Input::all(),
			[
		    'fname' => 'required|string|between:2,50',
		    'lname' => 'required|string|between:2,50',
            'email' => 'required|email|max:255|unique:users,id,'.$id,
            'username' => 'string|max:255|unique:users,id,'.$id,
		    'role' => 'string',
			'img' => 'max:1000',
		    'address' => 'string|between:2,50',
		    'mob_no' => 'required|digits_between:0,12',
		    'status' => 'string',
		    'role' => 'string|in:Admin,Staff,User',
		    'description' => 'string',
			]
		);
		
		//test if inputs fails
		if($validator->fails()){
			$messages = $validator->messages();
			// dd($validator->messages());
			return $messages;
			return Redirect::back()->withErrors($validator)->withInput()->withMessage('Change a few things up and try submitting again.!')->with('flash_type', 'error');
		}

		if(\Auth::user()->role == 'Admin' || \Auth::user()->role == 'Staff'){
			$user = User::findorFail($id);
			$user->role == Input::get('role');
		} else{
			$user = \Auth::user();
		}

		// // Checking username and emails if are taken
		// if(User::whereUsername($request->username)->where('id','!=',$request->user_id)->exists()){
		// 	return Redirect::back()->withErrors($validator)->withInput()->withMessage('The username you choose is already taken.!')->with('flash_type', 'error');
		// }else{
		// 	$user->username = Input::get('username');
		// }

		if(User::whereEmail($request->email)->where('id','!=',$request->user_id)->exists()){
			return Redirect::back()->withErrors($validator)->withInput()->withMessage('The email you choose is already taken.!')->with('flash_type', 'error');
		}else{
			$user->email = Input::get('email');
		}

		if(Input::get('password') !=null){
			$validator = Validator::make(Input::all(),
				[
	        'password' => 'required|min:5|confirmed',
	        'password_confirmation' => 'required|min:5'
				]
			);

			if($validator->fails()){
				$messages = $validator->messages();
				// return $messages;
				return Redirect::back()->withInput()->withErrors($validator)->withInput()->withMessage('Something is wrong with the passwords, Check and try again.!')->with('flash_type', 'error');
			}
			$user->password = password_hash(Input::get('password'), PASSWORD_BCRYPT, ['cost' => 10]);// bcrypt(Input::get('password'));
		}

		// Profile Pic
		if(Input::file('img')){
				if(Input::file('img')){
				$file = Input::file('img');
				$name = time(). '-' . $file->getClientOriginalName();
				$user->img = $name;
				try {
				$file = $file->move(public_path().'/img/users', $name);
				$user->img_url = public_path().'/img/users'.$name;
				} catch (Exception $e) {
				return Redirect::back()->withMessage($e->getMessage());
				}
			}else{
				return Redirect::back()->withInput()->withMessage('Profile picture failed to upload, Try again..!')->with('flash_type', 'error');
			}
			if(file_exists($file)==false){
				return Redirect::back()->withInput()->withMessage('Profile picture failed to upload, Try Again..!')->with('flash_type', 'error');
			}
		}

		$user->fname = Input::get('fname');
		$user->lname = Input::get('lname');
		$user->email = Input::get('email');
		$user->address = Input::get('address');
		// $user->mob_no = Input::get('mob_no'); 
		$user->mob_no = preg_replace('/^(?:\+?255|0)?/','255', Input::get('mob_no'));
		$user->description = Input::get('description');
		// dd($user);
		if(\Auth::user()->role == 'Admin' || \Auth::user()->role == 'Staff'){
			$user->status = Input::get('status');
			$user->role = Input::get('role');
			$user->update();
			return Redirect::back()->withMessage($user->name.' '.$user->lname.' Information is updated successful')->with('flash_type', 'success');
		}else{
			$user->update();
			return redirect('/profile')->withMessage($user->name.' '.$user->lname.' Information is updated successful')->with('flash_type', 'success');
		}
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
