@extends('layouts.app')

@section('content')
<main class="container mx-auto  sm:px-4 py-12 items-center">
    <h1 class="h1 md:text-5xl font-bold text-votum-blue text-center mb-4">
        {{ __('nav.contacts')}}
    </h1>

    <div class="text-center mb-12">
        <h2 class="h2 text-votum-blue font-semibold inline-block px-8 py-3">
            {{ __('nav.inTouch')}}
        </h2>
    </div>

    <div class="mx-auto grid gap-8">

        <div class="space-y-6 p-4">
            @php $colorToggle = true; @endphp

            @if($address && $address->isNotEmpty())
                <x-contacts.address :data="$address" :isSK="$isSK" :color="$colorToggle"/>
                @php $colorToggle = !$colorToggle; @endphp
            @endif

            @if($mail && $mail->isNotEmpty())
                <x-contacts.mail :data="$mail" :isSK="$isSK" :color="$colorToggle"/>
                @php $colorToggle = !$colorToggle; @endphp
            @endif

            @if($phone && $phone->isNotEmpty())
                <x-contacts.tel :data="$phone" :isSK="$isSK" :color="$colorToggle"/>
                @php $colorToggle = !$colorToggle; @endphp
            @endif

            @if($bank && $bank->isNotEmpty())
                <x-contacts.bank :data="$bank" :isSK="$isSK" :color="$colorToggle"/>
                @php $colorToggle = !$colorToggle; @endphp
            @endif

            @if($identification && $identification->isNotEmpty())
                <x-contacts.identification :data="$identification" :isSK="$isSK" :color="$colorToggle"/>
                @php $colorToggle = !$colorToggle; @endphp
            @endif
        </div>

    </div>

    <x-home />
</main>


@endsection
