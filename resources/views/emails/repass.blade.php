@component('mail::message')
# Introduction

Reset Password link here

@component('mail::button', ['url' => route('reset.form', ['email' => $email, 'token' => $token])])
Get Link
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
