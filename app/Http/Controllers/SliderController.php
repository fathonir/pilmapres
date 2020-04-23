<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Http\Request;
use App\Slider;	
// use App\Http\Controllers\Controller;
use Auth;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use File;
// use Intervention\Image\ImageManagerStatic as Image;
use Image;



class SliderController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Index Slider'))) {

        $sliders = Slider::orderBy('created_at', 'desc')->get();
        return view('slider.list',array('sliders'=>$sliders, 'user' => $user));

        }else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
            return Redirect::action('HomeController@blockAkses');
        }
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Create Slider'))) {

        return View::make('slider.create',array('user' => $user));

        }else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
            return Redirect::action('HomeController@blockAkses');
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        // echo "<pre>";
        // print_r($request->all());
        // // print_r($user->id);
        // echo "</pre>";
        // exit();
        // store
        $sliders = new Slider;
        $sliders ->user_id		= $user->id;
        $sliders ->judul		= Input::get('judul');
        $sliders ->deskripsi    = Input::get('deskripsi');
        $sliders ->gambar		= Input::get('image');

        $img = $request->file('image');
        $imageName = time().'.'.$img->getClientOriginalExtension();

        //thumbs
        $destinationPath = public_path('images/slider/thumbs');
        if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
        }
          $image = Image::make($img->getRealPath());
          $image->fit(200, 200);
          $image->save($destinationPath.'/'.$imageName);

        //original
        $destinationPath = public_path('images/slider');
        $img = Image::make($img)->encode('jpg', 50);
        $img->save($destinationPath.'/'.$imageName);
        //save data image to db
        $sliders->gambar = $imageName;
        $sliders->save();

        
        // redirect
        return Redirect::action('SliderController@index')->with('flash-success','The user has been added.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user   = Auth::user();

        if (($user)&&($user->hasAnyRole('Edit Slider'))) {

        $slider = Slider::where('id', $id)->firstOrFail();   
        return view('slider.edit', compact('slider'),array('user' => $user));

        }else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
            return Redirect::action('HomeController@blockAkses');
        }
    }

    public function update(Request $request, $id)
    {
        // echo "<pre>";
        // print_r($request->all());
        // echo "<pre>";
        // exit();

        $user   = Auth::user();

        $slider = Slider::findOrFail($id); 
        $slider ->user_id       = $user->id;
        $slider ->judul         = Input::get('judul');
        $slider ->deskripsi     = Input::get('deskripsi');
        $slider ->gambar        = Input::get('image');

        if ($request->hasFile('image')) {

            $img = $request->file('image');
            $imageName = time().'.'.$img->getClientOriginalExtension();

            //thumbs
            $destinationPath = public_path('images/slider/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
              $image = Image::make($img->getRealPath());
              $image->fit(200, 200);
              $image->save($destinationPath.'/'.$imageName);

            //original
            $destinationPath = public_path('images/slider');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $slider->gambar = $imageName;

        }else{
            $slider ->gambar    = Input::get('image');
        }
        $slider->save();
        return Redirect::action('SliderController@index', compact('slider'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
	    {
	        $user = Auth::user();

            if (($user)&&($user->hasAnyRole('Show Slider'))) {

	        $slider = Slider::where('id', $id)->firstOrFail();   
	        return view('slider.show', compact('slider'),array('user' => $user));

             }else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
            return Redirect::action('HomeController@blockAkses');
            }
	    }
	    /**
	     * Display the specified resource.
	     *
	     * @param  int  $id
	     * @return \Illuminate\Http\Response
	     */
    public function destroy($id)
	    {
	        $slider = Slider::where('id', $id)->firstOrFail();
	        $slider->delete();
	        return Redirect::action('SliderController@index');
	    }

	    /**
	     * Display the specified resource.
	     *
	     * @param  int  $id
	     * @return \Illuminate\Http\Response
	     */
    public function search(Request $request){
	    $user = Auth::user();
	    $search = $request->get('search');
	    $sliders = Slider::where('judul','LIKE','%'.$search.'%')
	    		         ->get();
	    return view('slider.list', compact('sliders'),array('user' => $user));
	}

}
