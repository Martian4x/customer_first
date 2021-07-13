<?php

namespace App\Http\Controllers;
use App\Maincategory;
use App\Product;
use Validator;
use Input;
use Image;
use Redirect;
use DB;
use Carbon\Carbon;
use App\Http\Requests\MaincategoryRequest;
use App\Http\Requests as Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Request2;

class MaincategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function subcategories($id) // Main category id
    {
		$vars['maincategory'] = Maincategory::find($id);
		$vars['subcategories'] = $vars['maincategory']->subcategories;
		// dd($vars['subcategories']);
		$vars['title'] = 'Subcategories';
    	$vars['sub_title'] = $vars['maincategory']->name;
		return view('manage.subcategories.index', compact('vars'));
    }

    public function create()
    {
        $vars['types'] = Product::types();
        $vars['title'] = 'Main category';
        $vars['sub_title'] = 'Add a main category';
        return view('manage.maincategories.create', compact('vars'));
    }

    public function store(MaincategoryRequest $request)
    {
    	$input = $request->all();
		$maincategory = Maincategory::create($input);
		return Redirect::back()->withMessage($maincategory->name.' added successful')->with('flash_type', 'success');
    }

	public function show($id)
	{
		$maincategory = Maincategory::find($id);
		if($maincategory == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
		}
		$vars['title'] = $maincategory->title;
    	$vars['sub_title'] = 'maincategory details';
    	$vars['maincategory'] = $maincategory;
		return view('manage.maincategories.show', compact('vars',$maincategory));
	}

	public function edit($id)
	{
        $vars['types'] = Product::types();
		$maincategory = Maincategory::find($id);
		if($maincategory == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
		}
		$vars['title'] = $maincategory->name;
    	$vars['sub_title'] = 'Edit main category';
    	$vars['maincategory'] = $maincategory;
		return view('manage.maincategories.edit', compact('vars'));
	}


	public function update($id, MaincategoryRequest $request)
	{
		$maincategory = Maincategory::findorFail($id);
		if($maincategory == null){
			return Redirect::back()->withMessage('What you request does not exist..');
		}
		$input = $request->all();
		$maincategory->update($input);
		return Redirect::route('manage.maincategories.show', $id)->withMessage($maincategory->name.' updated successful')->with('flash_type', 'success');
	}

    public function destroy($id)
    {
		if(\Auth::user()->role != 'Admin'){
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
        $maincategory = Maincategory::findorFail($id)->delete();
        return \Response::Json('Delete Success', 200);
        // return Redirect::back()->withMessage('Tariff has been deleted..')->with('flash_type', 'success');
    }
}
