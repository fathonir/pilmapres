<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $address = 'no.reply.pilmapres.kemdikbud@gmail.com'; //email pengirim
        $subject = 'Register Peserta!'; // judul
        $name = 'Pilmapres 2020'; // nama pengirim

        return $this->view('emails.test')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 
                      'nama_peserta' => $this->data['nama_peserta'], 
                      'email_peserta' => $this->data['email_peserta'],  
                      'token_peserta' => $this->data['token_peserta'],  
                      'password_peserta' => $this->data['password_peserta']  
                    ]);
    }
}