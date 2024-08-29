<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserValidated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Crée une nouvelle instance de UserValidatedMail.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Construire le message de l'e-mail.
     *
     * @return $this
     */
    public function build()
{
    return $this->view('emails.user_validated')
                ->with([
                    'name' => $this->user->name,
                    'loginUrl' => url('/login'),
                ]);
}

}
