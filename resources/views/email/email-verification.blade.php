@component('mail::message')
# Introduction

The Code Required to Activate your email is .

@component('mail::panel')
    NAME : {{ $userName }}
    VERIFICATION CODE : {{ $verificationCode }} <br> 
@endcomponent

@component('mail::button', ['url' => '#'])
   Click here to activate your email.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
