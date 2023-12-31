<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoticeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $main;

    /**
     * Create a new message instance.
     */
    public function __construct($title, $main)
    {
        $this->title = $title;
        $this->main = $main;
    }

    public function build()
    {
        return $this
            ->subject($this->title)
            ->view('mail.notice_email')
            ->with(['main' => $this->main]);
    }
}
