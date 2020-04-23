<?php

namespace App\Http\Controllers\admin;


use Auth;
use View;
use App\Agenda;
use App\CategoryEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use File;
use Image;

class AgendaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Index Agenda'))) {

        $agendas = Agenda::orderBy('created_at', 'desc')->get();
        // echo "<pre>";
        // print_r($agendas);
        // echo "</pre>";
        // exit();
        return view('admin.agenda.list',array('agendas'=>$agendas, 'user' => $user));
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
        
      if (($user)&&($user->hasAnyRole('Create Agenda'))) {

        $agendas    = CategoryEvent::pluck('judul', 'id_category_event');
        return View::make('admin.agenda.create', compact('agendas', 'user'));
    
    }else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
            return Redirect::action('HomeController@blockAkses');
        }
    }

    public function store(Request $request)
    {
    	// echo "<pre>";
     //    print_r($request->all());
     //    echo "</pre>";
     //    exit();
		$user = Auth::user();

        // store
        $agendas                           = new Agenda;
		    $agendas ->user_id                 = $user->id;
        $agendas ->id_category_event       = Input::get('id_category_event');
        $agendas ->judul    	             = Input::get('judul');
        $agendas ->deskripsi               = Input::get('deskripsi');

        $img = $request->file('file');
            $imageName = time().'.'.$img->getClientOriginalExtension();

            //thumbs
            $destinationPath = public_path('images/agenda/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
              $image = Image::make($img->getRealPath());
              $image->fit(200, 200);
              $image->save($destinationPath.'/'.$imageName);

            //original
            $destinationPath = public_path('images/agenda');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $agendas->file = $imageName;

            $agendas->save();


         /* echo "<pre>";
        print_r($agendas);
        echo "</pre>";
        exit();*/
            return Redirect::action('admin\AgendaController@index');
        }

    public function show($id)
    {
        $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Show Agenda'))) {

        $agendas = Agenda::where('id', $id)->firstOrFail();   
        return view('admin.agenda.show', compact('agendas'),array('user' => $user));
    
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

    public function edit($id)
    {
        $user = Auth::user();
        
        if (($user)&&($user->hasAnyRole('Edit Agenda'))) {

        $agendas = Agenda::where('id', $id)->firstOrFail();   
        return view('admin.agenda.edit', compact('agendas'),array('user' => $user));
    
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

    public function update(Request $request, $id)
    {
        // echo "<pre>";
        // print_r('haha');
        // // print_r($request->all());
        // echo "</pre>";
        // exit();
        $user = Auth::user();
        $agendas = Agenda::findOrFail($id); 
        $agendas ->user_id      = $user->id;
        $agendas ->judul        = Input::get('judul');
        $agendas ->deskripsi    = Input::get('deskripsi');
        // echo "<pre>";
        // print_r($request->file->getClientOriginalName());
        // // print_r($request->all());
        // echo "</pre>";
        // exit();

        if ($request->hasFile('file')) {
            $img = $request->file('file');
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/agenda/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
              $image = Image::make($img->getRealPath());
              $image->fit(200, 200);
              $image->save($destinationPath.'/'.$imageName);

            //original
            $destinationPath = public_path('images/agenda');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $agendas->file = $imageName;
        }else{
            $agendas ->file    = Input::get('file');

        }
            $agendas->save();
            return Redirect::action('admin\AgendaController@index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $agendas = Agenda::where('id', $id)->firstOrFail();
        $agendas->delete();
        return Redirect::action('admin\AgendaController@index');
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
        $agendas = Agenda::where('judul','LIKE','%'.$search.'%')->get();
        return view('admin.agenda.list', compact('agendas'),array('user' => $user));
    }
}
