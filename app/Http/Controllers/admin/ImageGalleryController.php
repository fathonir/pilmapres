<?php

namespace App\Http\Controllers\admin;


use Auth;
use View;
use App\Gallery;
use App\ImageGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use File;
use Image;

class ImageGalleryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $image_galleries = ImageGallery::orderBy('created_at', 'desc')->get();
        // echo "<pre>";
        // print_r($image_galleries);
        // echo "</pre>";
        // exit();
        return view('admin.image-gallery.list',array('image_galleries'=>$image_galleries, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $galleries = Gallery::pluck('judul', 'id');
    //     return View::make('admin.image-gallery.create', compact('galleries'));
    // }

    public function create($id)
    {
        // print_r($id);
        // exit();
        // $galleries = Gallery::pluck('judul', 'id');
        return View::make('admin.image-gallery.create', compact('id'));
    }

    public function store(Request $request, $id)
    {
        // echo "<pre>";
     //    print_r($request->all());
     //    echo "</pre>";
     //    exit();
        $user = Auth::user();

        // store
        $galleries = new ImageGallery;
        $galleries ->user_id        = $user->id;
        $galleries ->gallery_id     = Input::get('gallery_id');

        $img = $request->file('image');
            $imageName = time().'.'.$img->getClientOriginalExtension();

            //thumbs
            $destinationPath = public_path('images/image-gallery/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
              $image = Image::make($img->getRealPath());
              $image->fit(200, 200);
              $image->save($destinationPath.'/'.$imageName);

            //original
            $destinationPath = public_path('images/image-gallery');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $galleries->image = $imageName;

            $galleries->save();
            // return Redirect::action('admin\ImageGalleryController@index');
            return Redirect ('/gallery/show/'.$id)->with('alert-success','Data Generate Cocok dan Telah Di Simpan Ke Database !!!.');
    }

    public function show($id)
    {
        $user = Auth::user();
        $image_gallery = ImageGallery::where('id', $id)->firstOrFail();   
        return view('admin.image-gallery.show', compact('image_gallery'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = Auth::user();
        $galleries = Gallery::pluck('judul', 'id');
        $image_gallery = ImageGallery::where('id', $id)->firstOrFail();   
        return view('admin.image-gallery.edit', compact('image_gallery', 'galleries'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $galleries = ImageGallery::findOrFail($id); 
        $galleries ->user_id        = $user->id;
        $galleries ->gallery_id     = Input::get('gallery_id');

        $img = $request->file('image');
            $imageName = time().'.'.$img->getClientOriginalExtension();

            //thumbs
            $destinationPath = public_path('images/image-gallery/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
              $image = Image::make($img->getRealPath());
              $image->fit(200, 200);
              $image->save($destinationPath.'/'.$imageName);

            //original
            $destinationPath = public_path('images/image-gallery');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $galleries->image = $imageName;

            $galleries->save();
            return Redirect::action('admin\ImageGalleryController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        $gallery_id     = Input::get('gallery_id');
        $gallery = ImageGallery::where('id', $id)->firstOrFail();
        $gallery->delete();
        return Redirect ('/gallery/show/'.$gallery_id)->with('alert-success','Data Generate Cocok dan Telah Di Simpan Ke Database !!!.');
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
        $image_galleries = ImageGallery::where('gallery_id','LIKE','%'.$search.'%')->get();
        return view('admin.image-gallery.list', compact('image_galleries'),array('user' => $user));
    }
}
