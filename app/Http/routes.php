<?php
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');
Route::auth();
Route::get('/sms_received', 'FrontendController@sms_received');
// Socialite urls
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');
Route::get('/home', 'HomeController@index');
Route::get('/profile', 'UsersController@profile');
Route::get('/supplier_register', ['as' => 'suppliers.register', 'uses' =>  'SuppliersController@register']);
Route::post('/add_to_cart', ['as' => 'add_to_cart', 'uses' => 'FrontendController@add_to_cart']);
Route::get('/cart_list', ['as' => 'cart_list', 'uses' =>  'FrontendController@cart_list']);
Route::get('/check_out', ['as' => 'check_out', 'uses' =>  'FrontendController@check_out']);
Route::get('/billing_address', ['as' => 'billing_address', 'uses' =>  'FrontendController@check_out']);
Route::post('/ajax_order_now', ['as' => 'ajax_order_now', 'uses' =>  'FrontendController@order_now']);

//Pages
Route::get('/pages/tos', ['as' => 'tos', 'uses' => 'FrontendController@tos']);
Route::get('/pages/about_us', ['as' => 'about_us', 'uses' => 'FrontendController@about_us']);
Route::get('/pages/help', ['as' => 'help', 'uses' => 'FrontendController@help']);
Route::get('/pages/faq', ['as' => 'faq', 'uses' => 'FrontendController@faq']);
Route::get('/pages/exporting_importing', ['as' => 'exporting_importing', 'uses' => 'FrontendController@exporting_importing']);
Route::get('/pages/contact', ['as' => 'contact', 'uses' => 'FrontendController@contact']);
Route::get('/pages/sellers', ['as' => 'sellers', 'uses' => 'FrontendController@sellers']);
Route::get('/pages/report_abuse', ['as' => 'report_abuse', 'uses' => 'FrontendController@report_abuse']);
Route::get('/pages/report_bug', ['as' => 'report_bug', 'uses' => 'FrontendController@report_bug']);
Route::get('/pages/payment_info', ['as' => 'payment_info', 'uses' => 'FrontendController@payment_info']);
Route::get('/pages/privacy_policy', ['as' => 'privacy_policy', 'uses' => 'FrontendController@privacy_policy']);
Route::get('/pages/consultation', ['as' => 'consultation', 'uses' => 'FrontendController@consultation']);
Route::get('/pages/training', ['as' => 'training', 'uses' => 'FrontendController@training']);

//Products
Route::get('/search', ['as' => 'search', 'uses' => 'FrontendController@search']);
Route::get('/products', ['as' => 'products', 'uses' => 'FrontendController@products']);
Route::get('/products/{id}', 'FrontendController@show_product');
Route::get('/products/maincategory/{slug}', ['as' => 'maincategory', 'uses' => 'FrontendController@maincategory']);
Route::get('/products/maincategory/{slug}/subcategory/{subcategory_slug}', ['as' => 'maincategory', 'uses' => 'FrontendController@subcategory']);

// App management area route
Route::group(['prefix' => 'manage/'], function () {
	Route::get('/', 'DashboardController@index');
	Route::get('users/search', ['as' => 'manage.users.search', 'uses' => 'UsersController@search']);
	Route::get('users/{id}/orders', 'UsersController@user_orders');
	Route::post('/users/ajax_request_otp', 'UsersController@request_otp');
	Route::post('/users/ajax_verify_mob_no', 'UsersController@verify_mob_no');
	Route::resource('users', 'UsersController');
	Route::get('suppliers/status/{status}', 'SuppliersController@status');
	Route::get('supplier', 'DashboardController@index');
	Route::get('suppliers/{id}/verify', 'SuppliersController@verify');
	// Customers
	Route::get('suppliers/{id}/customers', 'SuppliersController@customers');
	Route::get('suppliers/customers/create', 'CustomersController@create');
	// Fetch referral people
	Route::get('/customers/ajax-to-array', function(){
		$supplier = \App\Supplier::find(\Input::get('supplier_id'));
		if($supplier){
			$recepients_array = [];
			if(\Input::get('recepients_type')=='customers'){
				$customers = $supplier->customers;
				foreach($customers as $customer){
					$recepients_array[$customer->id] = $customer->fname.' '.$customer->lname.' ('.$customer->mob_no.')';
				}
			}
			if(\Input::get('recepients_type')=='couriers'){
				$couriers = $supplier->couriers;
				foreach($couriers as $courier){
					$recepients_array[$courier->id] = $courier->fname.' '.$courier->lname.' ('.$courier->mob_no.')';
				}
			}
			if(\Input::get('recepients_type')=='partners'){
				$partners = $supplier->partners;
				foreach($partners as $partner){
					$recepients_array[$partner->id] = $partner->fname.' '.$partner->lname.' ('.$partner->mob_no.')';
				}
			}
		}
		return Response::json($recepients_array);
	});
	Route::resource('customers', 'CustomersController');
	
	// couriers
	Route::get('suppliers/{id}/couriers', 'SuppliersController@couriers');
	Route::get('suppliers/couriers/create', 'CouriersController@create');
	Route::resource('couriers', 'CouriersController');
	
	// partners
	Route::get('suppliers/{id}/partners', 'SuppliersController@partners');
	Route::get('suppliers/partners/create', 'PartnersController@create');
	Route::resource('partners', 'PartnersController');
	
	// SMS
	Route::post('/sms/ajax_check_balance', 'SMSController@check_balance');
	Route::post('/sms/ajax_send_bulk', 'SMSController@send_bulk');
	Route::post('/sms/two_way_callback', 'SMSController@two_way');
	Route::get('suppliers/sms', 'SMSController@dashboard');

	Route::get('suppliers/search', ['as' => 'manage.suppliers.search', 'uses' => 'SuppliersController@search']);
	Route::get('suppliers/{id}/products/create', 'ProductsController@create');
	Route::resource('suppliers', 'SuppliersController');
	Route::get('maincategories/{id}/subcategories', 'MaincategoriesController@subcategories');
	Route::get('maincategories/{id}/subcategories/create', 'SubcategoriesController@create');
	Route::resource('maincategories', 'MaincategoriesController');
	Route::get('type/{type}', 'TypesController@type');
	Route::get('badge/{type}', 'DashboardController@badge');
	Route::post('upload', ['as' => 'upload-post', 'uses' =>'ImageController@postUpload']);
	Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'ImageController@deleteUpload']);
	Route::get('products/{id}/photos', 'ProductsController@photos');
	Route::post('products/badge_update', ['as' => 'manage.products.badge_update', 'uses' =>'ProductsController@badge_update']);
	Route::post('products/photo_store', ['as' => 'manage.products.photo_store', 'uses' =>'ProductsController@photo_store']);
	Route::get('products/search', ['as' => 'manage.products.search', 'uses' => 'ProductsController@search']);
	Route::get('products/type/{type}', 'ProductsController@type');
	Route::resource('subcategories', 'SubcategoriesController');
	Route::get('suppliers/{id}/products', 'ProductsController@index');
	Route::resource('products', 'ProductsController');
	
	// Orders
	Route::get('orders/status/{status}', 'OrdersController@status');
	Route::get('suppliers/orders/status/{status}', 'OrdersController@status');
	Route::get('suppliers/{id}/orders', 'OrdersController@index');
	Route::get('suppliers/{supplier_id}/customers/{customer_id}/orders', 'OrdersController@customer_index');
	Route::get('suppliers/orders/create', 'OrdersController@create');
	Route::get('checkout/callback', 'OrdersController@checkout_callback');
	Route::post('orders/supplier_store', ['as' => 'manage.orders.supplier_store', 'uses' =>'OrdersController@supplier_store']);
	Route::resource('orders', 'OrdersController');
	
	// Reward
	Route::get('suppliers/{id}/rewards', 'RewardsController@index');
	Route::resource('rewards', 'RewardsController');

	Route::get('banners/search', ['as' => 'manage.banners.search', 'uses' => 'BannersController@search']);
	Route::resource('banners', 'BannersController');
	Route::resource('carts', 'CartsController');
	Route::get('settings/', 'DashboardController@index');

	//type ajax fetch main categories
	Route::get('/ajax-product_type', function(){
		$type_name = Input::get('type_name');
		$maincategories = \App\Maincategory::whereType($type_name)->get();
		return Response::json($maincategories);
	});

	//type ajax fetch sub categories
	Route::get('/ajax-maincategory', function(){
		$maincategory_id = Input::get('maincategory_id');
		$subcategories = \App\Subcategory::whereMaincategoryId($maincategory_id)->get();
		return Response::json($subcategories);
	});
});


// Route::post('/checking/username', ['as' => 'checking.username', 'uses' => 'UsersController@checking_username']);

Route::post('/checking/email_username', function(Request $request){
 // dd('die');
 	if($request->username!=''){
 		// return Response::json('username');
 		if (\App\User::whereUsername($request->username)->where('id','!=',$request->user_id)->exists()){
	        $response['responseUsername'] = ['messageUsername'=>'<span class="red"> <i class="fa fa-times"></i> Sorry '.$request->username.' is already taken</span>', 'statusUsername'=>'failed'];
	    }else{
	        $response['responseUsername'] = ['messageUsername'=>'<span class="green"> <i class="fa fa-check"></i> '.$request->username.' is available</span>', 'statusUsername'=>'success'];
	    }
	}else{
		$response['responseUsername'] = [];
	}

 	if($request->email!=''){
 		// return Response::json('email');
 		if (\App\User::whereEmail($request->email)->where('id','!=',$request->user_id)->exists()){
	        $response{'responseEmail'} = ['messageEmail'=>'<span class="red"> <i class="fa fa-times"></i> Sorry '.$request->email.' is already taken</span>', 'statusEmail'=>'failed'];
	    }else{
	        $response['responseEmail'] = ['messageEmail'=>'<span class="green"> <i class="fa fa-check"></i> '.$request->email.' is good</span>', 'statusEmail'=>'success'];
	    }
	}else{
		$response['responseEmail'] = [];
	}
	return Response::json($response);
});
