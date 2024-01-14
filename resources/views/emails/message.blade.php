@component('mail::message')
    # {{ $subject }}

    {!! $content !!}

    Thanks,
    {{ $name }}
@endcomponent
