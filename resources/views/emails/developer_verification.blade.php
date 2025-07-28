@component('mail::message')
# Email Verification

Hello {{ $developer->contact_person }},

Thank you for registering your company {{ $developer->company_name }} with us. Please verify your email address to complete your registration.

@component('mail::button', ['url' => route('developer.verify', $developer->id)])
Verify Email Address
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent