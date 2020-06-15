<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PesertaRejectMail extends Mailable
{
    use Queueable, SerializesModels;

    public $keterangan_reject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($keterangan_reject)
    {
        $this->keterangan_reject = $keterangan_reject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Registrasi PILMAPRES Tidak Disetujui')
            ->view('emails.peserta_reject');
    }
}
