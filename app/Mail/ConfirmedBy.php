<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmedBy extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $guest;
    private $child;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $guest, $child)
    {
        $this->name = $name;
        $this->guest = $guest;
        $this->child = $child;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.confirmed_by')
            ->subject('Nowe potwierdzenie')
            ->with([
                'name' => $this->name,
                'guest' => $this->guest,
                'child' => $this->child
            ]);
    }
}
