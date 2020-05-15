<?php

namespace App\Http\Controllers\admin;
use DB;
use View;
use Auth;
use Input;
use Alert;
use App\User;
use App\Group;
use App\AdminPt;
use App\LogMail;
use App\Reviewer;
use App\UserGroup;
use App\PerguruanTinggi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user_requests = User::whereIsUserRequest(1)->orderBy('created_at', 'asc')->get();

      return view('admin.user.user-request', compact('user_requests'));
    }

    public function userApporved()
    {
        $user_approveds = User::whereActive(1)->get();

        return view('admin.user.user-approved', compact('user_approveds'));
    }

    public function userRejected()
    {
        $user_rejecteds = User::whereIsUserRejected(1)->get();

        return view('admin.user.user-rejected', compact('user_rejecteds'));
    }

    public function addUser(PerguruanTinggi $perguruan_tinggi)
    {
        $groups = Group::get();
        $perguruan_tinggis = $perguruan_tinggi->getPtAktif();

        return view('admin.user.user-add', compact('groups', 'perguruan_tinggis'));
    }

    public function addUserPost(Request $request)
    {
      $group = Group::whereId($request->id_group)->first(); 

        if ($group->name == 'Admin Master') {
          $group  = Group::where('name', 'Admin Master')->first();
          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = bcrypt($request->password);
          $user->active = 1;
          $user->is_user_request = 0;
          $user->is_user_rejected = 0;
          $user->save();
          $user->groups()->attach($group);

        }elseif ($group->name == 'Reviewer' || $group->name == 'Admin PT') {
          $perguruan_tinggi = PerguruanTinggi::whereId($request->id_pt)->first();

          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = bcrypt($perguruan_tinggi->kode.'php2d');
          $user->active = 1;
          $user->is_user_request = 0;
          $user->is_user_rejected = 0;
          $user->save();
          $user->groups()->attach($group);

          if ($group->name == 'Admin PT') {
            $admin_pt = new AdminPt();
            $admin_pt->nama     = $request->name;
            $admin_pt->users_id = $user->id;
            $admin_pt->id_pt    = $perguruan_tinggi->id;
            $admin_pt->kode_pt  = $perguruan_tinggi->kode;
            $admin_pt->nama_pt  = $perguruan_tinggi->nama;
            $admin_pt->save();
          }else{
            $reviewer = new Reviewer();
            $reviewer->nama     = $request->name;
            $reviewer->users_id  = $user->id;
            $reviewer->id_pt    = $perguruan_tinggi->id;
            $reviewer->kode_pt  = $perguruan_tinggi->kode;
            $reviewer->nama_pt  = $perguruan_tinggi->nama;
            $reviewer->save();
          }

        }

        Alert::success('Data Anda Berhasil Disimpan.')->persistent("Tutup");
        return redirect('/user-add');
    }

    public function userProcessVerification($status, $id)
    {
      $user = User::whereId($id)->first();

      if ($status == 'setuju') {
        $user->active = 1;
        $user->is_user_request = 0;
        $user->is_user_rejected = 0;
      }else{
        $user->active = 0;
        $user->is_user_request = 0;
        $user->is_user_rejected = 1;
      }
      
      $user->save();  

      if ($user->save()) {
        
          if ($user->is_user_rejected) {

            $log_mail = new LogMail;
            $log_mail->email_sender = "no.reply.pilmapres.kemdikbud@gmail.com";
            $log_mail->email_reciever = $user->email;
            $log_mail->name = $user->name;
            $log_mail->type = "verification_finalis_false";
            $log_mail->user_id = $user->id;
            $log_mail->is_sent = false;
            $log_mail->save();

          }else{

            $log_mail = new LogMail;
            $log_mail->email_sender = "no.reply.pilmapres.kemdikbud@gmail.com";
            $log_mail->email_reciever = $user->email;
            $log_mail->name = $user->name;
            $log_mail->type = "verification_finalis_true";
            $log_mail->user_id = $user->id;
            $log_mail->is_sent = false;
            $log_mail->save();

          }
                      
          // send mail on background 
          $base_path = base_path();
          $process = new Process('php artisan add:send-email > /dev/null 2>&1 &', $base_path); 
          $process->disableOutput();
          $process->run();
        }

      return redirect('/user-request');
    }
}
