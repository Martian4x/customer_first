<?php

namespace App\Http\Controllers;
use App\Banner;
use Validator;
use Input;
use Image;
use Redirect;
use File;
use DB;
use Carbon\Carbon;
use App\Http\Requests\BannerRequest;
use App\Http\Requests as Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Request2;

class BannersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['admin','staff']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->role == 'Admin'||\Auth::user()->role == 'Staff'){
            $vars['banners'] = Banner::paginate(30);
            $vars['sub_title'] = 'All home banners';
            $vars['title'] = 'Banners';
        }else{
            return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
        }
        return view('manage.banners.index', compact('vars'));
    }

    // Search the banners table
    public function search()
    {
        $vars['title'] = 'Seach Results';
        $vars['sub_title'] = Request2::get('q');
        $term = Request2::get('q');
        $vars['q'] = Request2::get('q');

        $vars['banners'] = $term? Banner::whereHas('user', function($query) use($term) {
            $query->where('fname', 'like', '%'.$term.'%')->where('lname', 'like', '%'.$term.'%');
        })->orWhere('company_name','LIKE','%'.$term.'%')->orderBy('company_name', 'asc')->paginate(25):banner::paginate(25);

        return view('manage.banners.index', compact('vars', $vars));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vars['status'] = Banner::status();
        $vars['title'] = 'Banners';
        $vars['sub_title'] = 'Add a new banner';
        return view('manage.banners.create', compact('vars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $input = $request->all();
        // dd(Input::all());
        if(Input::file('img')!=null){
            // dd('ues');
            $file = Input::file('img');
            $file_name = time().'_'.$file->getClientOriginalName();
            $image = Image::make($file);
            $width = $image->width();
            $height = $image->height();
            $slider_path = public_path().'/assets/img/sliders/';
            $thumb_path = public_path().'/assets/img/sliders/thumbnails/';

            //Checking for image dimensions
            if($width=='877'&&$height=='349'){  
            }elseif($width!='880'&&$height!='350'){
                $image->resize(880,350);
            }
            $image->save($slider_path.$file_name);

            // Creating thumbnail
            $image->resize(60, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save($thumb_path.$file_name);

            $input['img'] = $file_name;
            $input['url'] = $slider_path.$file_name;
        }
        // Saving the model
        $banner = Banner::create($input);

        return Redirect::back()->withMessage($banner->original_name.' uploaded successful')->with('flash_type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $banner = Banner::find($id);
        if($banner == null){
            return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
        }
        $vars['title'] = $banner->title;
        $vars['sub_title'] = 'Banner details';
        $vars['banner'] = $banner;
        return view('manage.banners.show', compact('vars',$banner));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vars['status'] = Banner::status();
        $banner = Banner::find($id);
        if($banner == null){
            return Redirect::back()->withMessage('What you request does not exist.. !')->with('flash_type', 'error');
        }
        $vars['title'] = $banner->name;
        $vars['sub_title'] = 'Edit banner';
        $vars['banner'] = $banner;
        return view('manage.banners.edit', compact('vars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $banner = Banner::findorFail($id);
        $input = $request->all();
        // dd(Input::all());
        if(Input::file('img')!=null){
            // dd('ues');
            $file = Input::file('img');
            $file_name = time().'_'.$file->getClientOriginalName();
            $image = Image::make($file);
            $width = $image->width();
            $height = $image->height();
            $slider_path = public_path().'/assets/img/sliders/';
            $thumb_path = public_path().'/assets/img/sliders/thumbnails/';

            //Checking for image dimensions
            if($width=='877'&&$height=='349'){  
            }elseif($width!='880'&&$height!='350'){
                $image->resize(880,350);
            }
            $image->save($slider_path.$file_name);

            // Creating thumbnail
            $image->resize(60, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save($thumb_path.$file_name);

            $input['img'] = $file_name;
            $input['url'] = $slider_path.$file_name;
        }
        // Saving the model
        $banner->update($input);

        return Redirect::route('manage.banners.show', $id)->withMessage($banner->original_name.' updated successful')->with('flash_type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = Banner::findorFail($id); 
        File::delete($img->url);
        File::delete(public_path().'/assets/img/sliders/thumbnails/'.$img->img);
        $img->delete();
        return \Response::Json('Delete Success', 200);
    }
}
