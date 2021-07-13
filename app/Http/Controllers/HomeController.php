<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Product;
use App\Maincategory;
use App\Supplier;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vars['title'] = 'sellyou';
        $vars['sub_title'] = 'Selling and Customer Relation Platform';
        // Products
        $vars['banners'] = Banner::orWhere('status','=','Show')->orWhere('status','=','Scheduled')->inRandomOrder()->take(6)->get();
        // $vars['banners'] = Banner::orWhere('status','=','Show')->orWhere('status','=','Scheduled')->inRandomOrder()->take(6)->get();

        // dd($vars['banners']);

        $vars['high_rated_products'] = Product::whereBadge('High-rated')->take(10)->get(); // Products carousel
        $vars['new_products'] = Product::orderBy('status', 'desc')->take(4)->get();
        $vars['recommended_products'] = Product::whereBadge('Recommended')->take(4)->get();
        $vars['sponsored_products'] = Product::whereBadge('Sponsored')->take(4)->get();
        $vars['popular_products'] = Product::orderBy('views', 'desc')->take(4)->get();

        // dd($vars['recommended_products']);

        $vars['featured_suppliers'] = Supplier::whereSupplierStatus('Active')->whereSupplierVerified('Yes')->take(23)->get();
        $vars['agricultural_maincategories'] = Maincategory::whereType('Agriculture')->get();
        $vars['clothing_maincategories'] = Maincategory::whereType('Clothing')->get();
        $vars['textile_maincategories'] = Maincategory::whereType('Textile')->get();
        $vars['crafts_maincategories'] = Maincategory::whereType('Craft')->get();
        $vars['mineral_maincategories'] = Maincategory::whereType('Mineral')->get();
        $vars['manufacturing_maincategories'] = Maincategory::whereType('Manufacturing')->get();
        $vars['electronic_maincategories'] = Maincategory::whereType('Electronic')->get();
        // dd($vars['featured_suppliers']);
        // return view('frontend.coming_soon', compact('vars'));
        return view('frontend.index', compact('vars'));
    }
}
