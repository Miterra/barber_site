<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class RdvConfirmation extends Mailable
{
    public $date;
    public $heure;

    public function __construct($date, $heure)
    {
        $this->date = $date;
        $this->heure = $heure;
    }

    public function build()
    {
        return $this->subject('Confirmation de votre rendez-vous')
                    ->view('emails.rdv');
    }
}