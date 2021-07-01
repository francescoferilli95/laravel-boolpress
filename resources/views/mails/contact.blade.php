@component('mail::message')
    
# You have a new contact message

**Name:** {{$contact['name']}}

**Email:** {{$contact['email']}}

**Message:** {{$contact['message']}}

@component('mail::button', ['url' => ''])
    View
@endcomponent


thanks, <br>
{{config('ap.name')}}
@endcomponent
