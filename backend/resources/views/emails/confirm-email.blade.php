@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Al.fi
        @endcomponent
    @endslot

    {{-- Body --}}
    # Hello

    You should confirm email before you can authenticate with this new email on our site.

    @component('mail::button', ['url' => $url])
        Confirm
    @endcomponent

    Thanks, {{ $username }}

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            Al.fi 2020 &copy;
        @endcomponent
    @endslot
@endcomponent
