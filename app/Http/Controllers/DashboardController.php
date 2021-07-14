<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use App\Http\Requests;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        // dd(\Auth::user()->role);
        if(\Auth::user()->role == 'Admin'||\Auth::user()->role == 'Staff'){
            // $vars['products'] = Product::whereBadge($badge)->paginate(30);
            $vars['title'] = 'Dashboard';
            $vars['sub_title'] = 'Admin Dashboard';
            return view('manage.dashboards.admin', compact('vars', $vars));
        }
        elseif(\Auth::user()->role == 'Supplier'){
            $vars['title'] = 'Business';
            $vars['sub_title'] = 'Admin Business';
            // $vars['supplier'] = \Auth::user()->supplier;
            // $vars['products'] = $vars['supplier']->products()->whereBadge($badge)->paginate(30);
            // $vars['customers'] = User::->count();
            $vars['customers'] = User::all()->count();
            return view('manage.dashboards.supplier', compact('vars', $vars));
        }else{
            return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
        }
        // dd($vars['users']);
    }

    //Browse by badge
    public function badge($badge)
    {

        if(\Auth::user()->role == 'Admin'||\Auth::user()->role == 'Staff'){
            $vars['products'] = Product::whereBadge($badge)->paginate(30);
        }
        elseif(\Auth::user()->role == 'Supplier'){
            $vars['supplier'] = \Auth::user()->supplier;
            $vars['products'] = $vars['supplier']->products()->whereBadge($badge)->paginate(30);
        }else{
            return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
        }

        // dd($vars['products']);
        $vars['title'] = 'Products';
        $vars['sub_title'] = ucfirst($badge).' products';
        return view('manage.products.index', compact('vars'));
    }
}
