<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $inputs;

    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    public function build()
    {
        return $this->subject('【' . config('salon.name') . '】お問い合わせありがとうございます')
            ->view('emails.contact');
    }
}
