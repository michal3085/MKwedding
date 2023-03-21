<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChildConfirme extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $child;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $child)
    {
        $this->name = $name;
        $this->child = $child;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.child')
            ->subject('Nowe dziecko')
            ->with([
                'name' => $this->name,
                'child' => $this->child
            ]);
    }
}
