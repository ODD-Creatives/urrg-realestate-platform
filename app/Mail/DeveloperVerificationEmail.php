<?php

namespace App\Mail;

use App\Models\Developer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeveloperVerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $developer;

    public function __construct(Developer $developer)
    {
        $this->developer = $developer;
    }

    public function build()
    {
        return $this->subject('Verify Your Developer Account')
                    ->view('emails.developer_verification');
    }
}