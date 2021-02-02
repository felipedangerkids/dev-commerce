<?php

namespace App\Mail;

use App\Models\Mails;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserCompra extends Mailable
{
    use Queueable, SerializesModels;

    private $mail;
    public function __construct(Mails $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.usercompraaviso')->with(
            [
                'name' => $this->mail->name,
                'assunto' => $this->mail->assunto,
                'mensagem1' => serialize($this->mail->mensagem1),
                'email' => $this->mail->email,
                'metodo' => $this->mail->metodo,
                'cep' => $this->mail->cep,
                'rua' => $this->mail->rua,
                'numero' => $this->mail->numero,
                'cidade' => $this->mail->cidade,
                'uf' => $this->mail->uf,
                'bairro' => $this->mail->bairro,
                'complemento' => $this->mail->complemento,
            ]
        );
    }
}
