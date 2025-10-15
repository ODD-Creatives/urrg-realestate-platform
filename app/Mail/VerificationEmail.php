<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels; 

    public $user;
    public $referralLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $referralLink)
    {
        $this->user = $user;
        $this->referralLink = $referralLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() 
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $this->user->id, 'hash' => sha1($this->user->email)]
        );  
        return $this->from('info@uniqueradiancerealtorsgroup.com', 'Uniqueradiancerealtorsgroup')
        ->subject('Notification Email - URRG')
        ->markdown('emails.verify-email')->with([ 
            'first_name' => $this->user->first_name, 
            'last_name' => $this->user->last_name, 
            'user_id' => $this->user->id, 
            'user_email' => $this->user->email,
            'realtorId' => $this->user->realtor_id,  
            'referralCode' => $this->referralLink, 
            'verifyUrl' => $verificationUrl, 

        ]);
    }
}