@extends('layouts.app')

@section('content')
<main class="container mx-auto px-4 py-12 items-center">
    <!-- Page Title -->
    <h1 class="text-4xl md:text-5xl font-bold text-votum-blue text-center mb-4">
        Kontakt
    </h1>

    <!-- Call to Action -->
    <div class="text-center mb-12">
        <p class="text-2xl text-votum-blue font-semibold inline-block px-8 py-3">
            Ozvite sa nám!
        </p>
    </div>

    <div class="mx-auto grid gap-8">

        <!-- Left Column -->
        <div class="space-y-6">
            <x-contacts.address />
            <x-contacts.mail />
            <x-contacts.tel />
            <x-contacts.identification />
            <x-contacts.bank />

        </div>

    </div>

    <x-home />
</main>
@endsection
