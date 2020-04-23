<?php

namespace App\Http\Controllers\admin;

use DB;
use View;
use Auth;
use Input;
use File;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class EventController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  
	public function index()
  {
    // if(Auth::user()->hasAnyRole('List EventEvent')){
      $events = Event::join('users', 'users.id', '=', 'events.user_id')
                       ->select('events.*',  'users.name AS username')
                       ->orderBy('events.created_at', 'desc')
                       ->paginate(10);
      $start_page= (($events->currentPage()-1) * 10) + 1;
      return view('admin.events.index',array('events' => $events, 'start_page'=>$start_page));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  } 

	public function create()
  {
    // if(Auth::user()->hasAnyRole('Create EventEvent')){
      return View::make('admin.events.create');
    // }else{
       // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function store(Request $request)
  {
    // if(Auth::user()->hasAnyRole('Create EventEvent')){
      $this->validate($request,[
            'judul'           =>'required|unique:events,judul',
            'gambar'          =>'required',
            ]);
      // store

      $event = new Event;
      $event->judul       = Input::get('judul');
      $event->deskripsi  = Input::get('deskripsi');
      if($request->hasFile('gambar')) {
        //image
        $image = $request->file('gambar');
        $fileName = str_random(10).'.'.$image->getClientOriginalExtension();
        // thumbs image
        $destinationPath = public_path('images/event/thumbs');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $img = Image::make($image->getRealPath());
        $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
              });
        $img->save($destinationPath.'/'.$fileName);
        // sava image
        if( $img = Image::make($image->getRealPath())->width()>500){
          $destinationPath = public_path('images/event');
          if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
          }
          $img = Image::make($image->getRealPath());
          // $img->resize(null, 800, function ($constraint) {
         //      $constraint->aspectRatio();
         //  });
          $img->save($destinationPath.'/'.$fileName);
        }else{
          $destinationPath = public_path('/images/event');
          if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
          }
          $image->move($destinationPath,$fileName);
        }
      $event->gambar = $fileName;
      }
      $files = Input::file('file');
      if(isset($files)){
        $fileName = str_random(10).'.'.$files->getClientOriginalExtension();
        $destinationPath = public_path('/images/event/file');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $event->file   = $fileName;
      }
      $event->user_id            = Auth::id();
      $event->save();
      
      // redirect
      return Redirect::action('admin\EventController@index');
    // }else{
       // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function show($id)
  {
    // if(Auth::user()->hasAnyRole('Details Event')){
      $event = Event::findOrFail($id);
      return view('admin.events.show', array('event' => $event));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function edit($id)
  {
    // if(Auth::user()->hasAnyRole('Edit Event')){
      $event = Event::findOrFail($id);
      return view('admin.events.edit', compact('event', 'categories'));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function update(Request $request, $id)
  {
    // if(Auth::user()->hasAnyRole('Edit Event')){
      $this->validate($request,[
            'judul'          =>'required',
            'deskripsi'      =>'required',
            ]);
      $event = Event::findOrFail($id);
      $event->judul       = Input::get('judul');
      $event->deskripsi  = Input::get('deskripsi');
      if($request->hasFile('gambar')) {
        //image
        $image = $request->file('gambar');
        $fileName = str_random(10).'.'.$image->getClientOriginalExtension();
        // thumbs image
        $destinationPath = public_path('images/event/thumbs');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $img = Image::make($image->getRealPath());
        $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
              });
        $img->save($destinationPath.'/'.$fileName);
        // sava image
        if( $img = Image::make($image->getRealPath())->width()>500){
          $destinationPath = public_path('images/event');
          if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
          }
          $img = Image::make($image->getRealPath());
          // $img->resize(null, 800, function ($constraint) {
         //      $constraint->aspectRatio();
         //  });
          $img->save($destinationPath.'/'.$fileName);
        }else{
          $destinationPath = public_path('/images/event');
          if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
          }
          $image->move($destinationPath,$fileName);
        }
      $event->gambar = $fileName;
      }
      $files = Input::file('file');
      if(isset($files)){
        $fileName = str_random(10).'.'.$files->getClientOriginalExtension();
        $destinationPath = public_path('/images/event/file');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $event->file   = $fileName;
      }
      $event->user_id    = Auth::id();
      $event->save();
      
      // redirect
      return Redirect::action('admin\EventController@index');
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function destroy($id)
  {
    // if(Auth::user()->hasAnyRole('Delete Event')){
  	  $event = Event::findOrFail($id);
      $event->delete();
      return Redirect::action('admin\EventController@index')->with('flash-success','The user has been deleted.');
    
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function search(Request $request)
  {
      $search = $request->get('search');
      $events = Event::where('judul','LIKE','%'.$search.'%')->paginate(10);
      $start_page= (($events->currentPage()-1) * 10) + 1;
        return view('admin.event.index', compact('events','start_page'));
  }
}
