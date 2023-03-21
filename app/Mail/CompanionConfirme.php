<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanionConfirme extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $companion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $companion)
    {
        $this->name = $name;
        $this->companion = $companion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.companion')
            ->subject('Nowa osoba towarzysząca')
            ->with([
            'name' => $this->name,
            'companion' => $this->companion
        ]);
    }
}
