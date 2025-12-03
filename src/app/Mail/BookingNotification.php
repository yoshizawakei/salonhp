<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $inputs;

    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    public function build()
    {
        return $this->subject('【Varjo】ご予約ありがとうございます')
            ->view('emails.booking');
    }
}
