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
use App\Http\Requests\CartRequest;
use App\Http\Requests as Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Request2;

class CartsController extends Controller
{
    public function destroy($id)
    {	
		$cart = Cart::whereUserId(\Auth::id())->whereId($id)->delete();
        return \Response::Json('Delete Success', 200);
    }
}
