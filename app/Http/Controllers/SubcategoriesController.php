<?php

namespace App\Http\Controllers;
use App\Maincategory;
use App\Subcategory;
use App\Product;
use Validator;
use Input;
use Image;
use Redirect;
use DB;
use Carbon\Carbon;
use App\Http\Requests\SubcategoryRequest;
use App\Http\Requests as Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Request2;

class SubcategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id) // Main category id
    {
        $vars['types'] = Product::types();
		$vars['maincategory'] = Maincategory::find($id);
        $vars['title'] = 'Sub category';
        $vars['sub_title'] = 'Add a sub category for '.$vars['maincategory']->name;
        return view('manage.subcategories.create', compact('vars'));
    }

    public function store(SubcategoryRequest $request)
    {
    	$input = $request->all();
    	// dd($input);
    	// $maincategory = Maincategory::findorFail($input->type);
		$subcategory = Subcategory::create($input);
		return Redirect::back()->withMessage($subcategory->name.' added successful')->with('flash_type', 'success');
    }

	public function show($id)
	{
		$maincategory = Subcategory::find($id);
		if($maincategory == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
		}
		$vars['title'] = $maincategory->title;
    	$vars['sub_title'] = 'maincategory details';
    	$vars['maincategory'] = $maincategory;
		return view('manage.subcategories.show', compact('vars',$maincategory));
	}

	public function edit($id)
	{
        $vars['types'] = Product::types();
		$maincategory = Subcategory::find($id);
		if($maincategory == null){
			return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
		}
		$vars['title'] = $maincategory->name;
    	$vars['sub_title'] = 'Edit main category';
    	$vars['maincategory'] = $maincategory;
		return view('manage.subcategories.edit', compact('vars'));
	}


	public function update($id, SubcategoryRequest $request)
	{
		$maincategory = Subcategory::findorFail($id);
		if($maincategory == null){
			return Redirect::back()->withMessage('What you request does not exist..');
		}
		$input = $request->all();
		$maincategory->update($input);
		return Redirect::route('manage.subcategories.show', $id)->withMessage($maincategory->name.' updated successful')->with('flash_type', 'success');
	}

    public function destroy($id)
    {
    	
		if(\Auth::user()->role != 'Admin'){
			return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
		}
        $maincategory = Subcategory::findorFail($id)->delete();
        return \Response::Json('Delete Success', 200);
        // return Redirect::back()->withMessage('Tariff has been deleted..')->with('flash_type', 'success');
    }
}
