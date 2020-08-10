@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Al.fi
        @endcomponent
    @endslot

    {{-- Body --}}
    # Hello. You have new user feedback:


    # Name:
    {{$name}}

    # Phone:
    {{$phone}}

    # E-mail
    {{$email}}

    # Message
    {{$message}}

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            Al.fi 2020 &copy;
        @endcomponent
    @endslot
@endcomponent
