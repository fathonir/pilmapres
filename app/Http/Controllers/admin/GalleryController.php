<?php

namespace App\Http\Controllers\admin;


use DB;
use View;
use Auth;
use File;
use Image;
use Input;
use App\Gallery;
use App\ImageGallery;
use App\CategoryGallerie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class GalleryController extends Controller
{
	public function index()
		{
		    $user = Auth::user();

		    if (($user)&&($user->hasAnyRole('Index Gallery'))) {

		    $galleries = Gallery::leftJoin('category_galleries', 'category_galleries.id_category_galleries', '=', 'galleries.id_category_galleries')
		    						->orderBy('galleries.created_at', 'desc')
		    						->select(
		    									'category_galleries.judul as judul_category',
		    									'galleries.judul',	
		    									'galleries.id',	
		    									'galleries.deskripsi',	
		    									'galleries.image'	
		    								)
		    						->get();
		   	// echo "<pre>";
		   	// print_r($galleries);
		   	// echo "</pre>";
		   	// exit();
		    return view('admin.gallery.list',array('galleries'=>$galleries, 'user' => $user));
		
		    }else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
            return Redirect::action('HomeController@blockAkses');
        }
		}  

	public function create()
		{
			$user = Auth::user();

			if (($user)&&($user->hasAnyRole('Create Gallery'))) {

			$categori_galleri    = CategoryGallerie::pluck('judul', 'id_category_galleries');
		  	return View::make('admin.gallery.create', compact('categori_galleri', 'user'));
		
		  	}else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
            return Redirect::action('HomeController@blockAkses');
        	}
		}

	public function store(Request $request)
		{
			// echo "<pre>";
	  //       print_r($request->all());
	  //       echo "<pre>";
	  //       exit();
			$user = Auth::user();
			// store
			$galleries 							= new Gallery;
			$galleries->user_id 				= $user->id;
			$galleries->id_category_galleries   = Input::get('id_category_gallery');
			$galleries->judul    				= Input::get('judul');
			$galleries->deskripsi    			= Input::get('deskripsi');
			
			$img = $request->file('image');
            $imageName = time().'.'.$img->getClientOriginalExtension();

            //thumbs
            $destinationPath = public_path('images/galleri/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
              $image = Image::make($img->getRealPath());
              $image->fit(200, 200);
              $image->save($destinationPath.'/'.$imageName);

            //original
            $destinationPath = public_path('images/galleri');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $galleries->image = $imageName;

			$galleries->save();

			return Redirect::action('admin\GalleryController@index');
		}


	  public function show($id)
		  {

		  	$user = Auth::user();

			if (($user)&&($user->hasAnyRole('Show Gallery'))) {

		      $gallery = Gallery::leftJoin('category_galleries', 'category_galleries.id_category_galleries', '=', 'galleries.id_category_galleries')
		    						->orderBy('galleries.created_at', 'desc')
		    						->select(
		    									'category_galleries.judul as judul_category',
		    									'galleries.judul',	
		    									'galleries.id',	
		    									'galleries.deskripsi',	
		    									'galleries.image'	
		    								)
    							->findOrFail($id);
        	  $image_galleries = ImageGallery::where('gallery_id', $id)->get();   
        	  // echo "<pre>";
        	  // print_r($image_gallery);
        	  // echo "</pre>";
        	  // exit();
		      return view('admin.gallery.show', array('gallery' => $gallery, 'image_galleries' => $image_galleries, 'user' => $user));
		  
		      }else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
            return Redirect::action('HomeController@blockAkses');
        }
		  }

	  public function edit($id)
		  {

		  	$user = Auth::user();

			if (($user)&&($user->hasAnyRole('Edit Gallery'))) {

			$categori_galleri    = CategoryGallerie::pluck('judul', 'id_category_galleries');
		    $gallery = Gallery::leftJoin('category_galleries', 'category_galleries.id_category_galleries', '=', 'galleries.id_category_galleries')
		    						->orderBy('galleries.created_at', 'desc')
		    						->select(
		    									'category_galleries.judul as judul_category',
		    									'galleries.judul',	
		    									'galleries.id_category_galleries as category_galleries',	
		    									'galleries.id',	
		    									'galleries.deskripsi',	
		    									'galleries.image'	
		    								)
		    						->findOrFail($id);     
		      return view('admin.gallery.edit', array('gallery' => $gallery, 'categori_galleri' => $categori_galleri, 'user' => $user));
		 
		 }else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
            return Redirect::action('HomeController@blockAkses');
        }
		  }

	  public function update(Request $request, $id)
		  {
		  	// echo "<pre>";
	    //     print_r($request->all());
	    //     echo "<pre>";
	    //     exit();
			$user = Auth::user();
			$galleries = Gallery::findOrFail($id);
			$galleries->user_id    = $user->id;
			// $galleries->id_category_galleries   = Input::get('id_category_gallery');
			$galleries->judul    = Input::get('judul');
			$galleries->deskripsi    = Input::get('deskripsi');
			
        	if ($request->hasFile('image')) {
	        	$img = $request->file('image');
	            $imageName = time().'.'.$img->getClientOriginalExtension();

	            //thumbs
	            $destinationPath = public_path('images/galleri/thumbs');
	            if(!File::exists($destinationPath)){
	                if(File::makeDirectory($destinationPath,0777,true)){
	                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
	                }
	            }
	              $image = Image::make($img->getRealPath());
	              $image->fit(200, 200);
	              $image->save($destinationPath.'/'.$imageName);

	            //original
	            $destinationPath = public_path('images/galleri');
	            $img = Image::make($img)->encode('jpg', 50);
	            $img->save($destinationPath.'/'.$imageName);
	            //save data image to db
	            $galleries->image = $imageName;
	        }else{
	            $galleries->image    = Input::get('image');

	        }
			$galleries->save();
		    
		      // redirect
		      return Redirect::action('admin\GalleryController@index');
		  }

	  public function destroy($id)
		{

			$image_gallery = ImageGallery::whereGalleryId($id)->get();
			
			foreach($image_gallery as $image_galleries) {
	      ImageGallery::whereId($image_galleries->id)->delete();
	    }

			$gallery = Gallery::findOrFail($id);
			$gallery->delete();

			return Redirect::action('admin\GalleryController@index')->with('success','User deleted successfully');
		}


	  public function search(Request $request)
		  {
		      $search = $request->get('search');
		      $galleries = Gallery::leftJoin('category_galleries', 'category_galleries.id_category_galleries', '=', 'galleries.id_category_galleries')
		    						->orderBy('galleries.created_at', 'desc')
		    						->select(
		    									'category_galleries.judul as judul_category',
		    									'galleries.judul',	
		    									'galleries.id',	
		    									'galleries.deskripsi',	
		    									'galleries.image'	
		    								)
		      						->where('galleries.judul','LIKE','%'.$search.'%')
		      						->get();
		        return view('admin.gallery.list', compact('galleries'));
		  }
}