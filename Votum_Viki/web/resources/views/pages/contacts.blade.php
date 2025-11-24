@extends('layouts.app')

@section('content')
<main class="container mx-auto  sm:px-4 py-12 items-center">
    <!-- Page Title -->
    <h1 class="h1 md:text-5xl font-bold text-votum-blue text-center mb-4">
        Kontakt
    </h1>

    <!-- Call to Action -->
    <div class="text-center mb-12">
        <p class="txt text-votum-blue font-semibold inline-block px-8 py-3">
            Ozvite sa nám!
        </p>
    </div>

    <div class="mx-auto grid gap-8">

        <!-- Left Column -->
        <div class="space-y-6 p-4">
            <x-contacts.address />
            <x-contacts.mail />
            <x-contacts.tel />
            <x-contacts.identification />
            <x-contacts.bank />
            <x-contacts.map />
        </div>

    </div>

    <x-home />
</main>


@endsection
