<?php

namespace App\Console\Commands;

use Mail;   
use \Crypt;
use App\User; 
use App\LogMail;
use App\CryptPass; 
use App\VerifyUser; 
use App\VerifyMail; 
use App\Mail\TestMail;
use App\Mail\TestEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:send-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $send_email_logs = LogMail::whereIsSent(false)->get();
            
      
      foreach ($send_email_logs as $key => $send_email_log) {
        try {

          if ($send_email_log->type == 'registration_finalis') {

            $user = User::whereId($send_email_log->user_id)->first();
            $cript  = CryptPass::where('user_id', $user->id)->first();
            $pass   = Crypt::decryptString($cript->pass);

            $verifyUser = VerifyUser::whereUserId($user->id)->first();

            // data yang dikirim
            $data = [
              'nama_peserta' => $user->name,
              'email_peserta' => $user->email,
              'token_peserta' => $verifyUser->token,
              'password_peserta' => $pass
            ];

            Mail::to($send_email_log->email_reciever)->send(new TestEmail($data));
            $send_email_log->is_sent = true;
            $send_email_log->description = "Email is sent";
            $send_email_log->send_date = date("Y-m-d H:m:s");
            $send_email_log->update();
          }

        } catch (\Exception $e) {
            $send_email_log->description = $e->getMessage();
            $send_email_log->update();
        }
        print_r("sent to: ".$send_email_log->email_reciever." logs: ".$send_email_log->description);
        echo "\n";
      }
    }
}
