<?php

namespace App\Http\Controllers\admin;

use View;
use DB;
use Auth;
use App\Testimony;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use File;


class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        // echo "<pre>";
        // print_r('haha');
        // echo "</pre>";
        // exit();
        $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Index Testimony'))) {

        $testimonis = Testimony::orderBy('created_at', 'desc')->get();
        return view('admin.testimony.list',array('testimonis'=>$testimonis, 'user' => $user));

        }else{
            return Redirect::action('HomeController@blockAkses');
        }
    }

    public function create()
    {
        $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Create Testimony'))) {

        return View::make('admin.testimony.create',array('user' => $user));

        }else{
            return Redirect::action('HomeController@blockAkses');
        }
        //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    }

     public function store(Request $data)
    {

        // echo "<pre>";       
        // print_r($data->all());
        // echo "</pre>";       
        // exit();

        $testimonis = new Testimony(); 
        $testimonis ->nama              = Input::get('nama');
        $testimonis ->jabatan              = Input::get('jabatan');
        $testimonis ->deskripsi          = Input::get('deskripsi');
        $testimonis ->pengalaman          = Input::get('pengalaman');

        $img = $data->file('image');
        $imageName = time().'.'.$img->getClientOriginalExtension();

        //thumbs
        $destinationPath = public_path('images/testimony/thumbs');
        if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
        }
          $image = Image::make($img->getRealPath());
          $image->fit(200, 200);
          $image->save($destinationPath.'/'.$imageName);

        //original
        $destinationPath = public_path('images/testimony');
        $img = Image::make($img)->encode('jpg', 50);
        $img->save($destinationPath.'/'.$imageName);
        //save data image to db
        $testimonis->images = $imageName;
        $testimonis->save();

        return Redirect::action('admin\TestimonyController@index', compact('testimonis'))->with('flash-success','The user has been added.');
        //
    }
    
    public function edit($id)
    {
        // echo "<pre>";       
        // // print_r($data->all());
        // print_r('haha');
        // echo "</pre>";       
        // exit();
        $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Edit Testimony'))) {

        $testimonis = Testimony::where('id', $id)->firstOrFail();
        return view('admin.testimony.edit', compact('testimonis','testimonis'),array('user' => $user));

        }else{
            return Redirect::action('HomeController@blockAkses');
        }
        //
    }

    public function update(Request $data, $id)
    {
        $testimonis = Testimony::findOrFail($id); 
        $testimonis ->nama                  = Input::get('nama');
        $testimonis ->jabatan               = Input::get('jabatan');
        $testimonis ->deskripsi             = Input::get('deskripsi');
        $testimonis ->pengalaman          = Input::get('pengalaman');
        

         $img = $data->file('images');
         $imageName = time().'.'.$img->getClientOriginalExtension();

        //thumbs
        $destinationPath = public_path('images/testimony/thumbs');
          $image = Image::make($img->getRealPath());
          $image->fit(200, 200);
          $image->save($destinationPath.'/'.$imageName);

        //original
        $destinationPath = public_path('images/testimony');
        $img = Image::make($img)->encode('jpg', 50);
        $img->save($destinationPath.'/'.$imageName);
        //save data image to db
        $testimonis->images = $imageName;
        $testimonis->save();

        return Redirect::action('admin\TestimonyController@index', compact('testimonis'))->with('flash-success','The user has been added.');
    }

    public function show($id)
    {
        $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Show Testimony'))) {

        $testimonis = Testimony::where('id', $id)->firstOrFail();  
        return view('admin.testimony.show', compact('testimonis'),array('user' => $user));

        }else{
            return Redirect::action('HomeController@blockAkses');
        }
        //
    }

      public function destroy($id)
    {
        $testimonis = Testimony::where('id', $id);
        $testimonis->delete();
        return Redirect::action('admin\TestimonyController@index')->with('flash-success','The user has been added.');
        //

    }   

     public function search(Request $request){
        $user = Auth::user();
        $search = $request->get('search');
        $testimonis = Testimony::where('nama','LIKE','%'.$search.'%')->paginate(10);
            return view('admin.testimony.list', compact('testimonis'),array('user' => $user));
    }
}