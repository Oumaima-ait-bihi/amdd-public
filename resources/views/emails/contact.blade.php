<x-mail::message>
# I am {{ $user['name']}}

 Subject: {{$user['subject']}}
 
 Message: {{$user['message']}}

Thanks,<br>
{{-- {{ config('app.name') }} --}}
</x-mail::message>

