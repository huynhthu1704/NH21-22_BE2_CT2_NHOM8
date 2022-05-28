@component('mail::message')
# Welcome to <span style="color: #cd9966;">Molla</span>

Sometimes in life, you have to spend your time and money on a person you never planned to. 
The person is called a Guest! Welcome to my house!



@component('mail::button', ['url' => 'http://localhost:8000/category'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
