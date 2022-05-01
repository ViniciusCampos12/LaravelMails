<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Constrói a mensagem para o e-mail.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->view('email.message', ['data' => $this->data])
        ->subject('Aplicação de envio de e-mail');
    }
}
