<?php
namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

class EmailVerificationRequest extends FormRequest
{
    /**
     * Authorize the request.
     */
    public function authorize(): bool
    {
        // Ensure the route user ID matches the authenticated user ID
        if (! $this->user() ||
            $this->route('id') != $this->user()->getKey() ||
            ! hash_equals((string) $this->route('hash'),
                          sha1($this->user()->getEmailForVerification()))
        ) {
            throw new AuthorizationException;
        }

        return true;
    }

    /**
     * Fulfill the email verification.
     */
    public function fulfill()
    {
        if (! $this->user()->hasVerifiedEmail()) {
            $this->user()->markEmailAsVerified();

            event(new \Illuminate\Auth\Events\Verified($this->user()));
        }
    }
}
