<?php

namespace App\Mail;

use App\Routage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RoutageDateToRevalidate extends Mailable
{
    use Queueable, SerializesModels;

    public $routage;
    public $date;

    /**
     * Create a new message instance.
     *
     * @param Routage $routage
     */
    public function __construct(Routage $routage, $date)
    {
        $this->routage = $routage;
        $this->date = $date;
        if ($this->date) {
            $this->routage->send_wish = $this->date;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Date du routage modifiée')
            ->replyTo('noreply@epistol.com')
            ->view('emails.date_revalidate');
    }
}
