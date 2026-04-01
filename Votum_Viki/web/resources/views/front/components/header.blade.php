@php
    $locale = app()->getLocale();
@endphp

<header id="main-header" class="fixed top-0 left-0 right-0 z-50">
    <div class="bg-blue-950 backdrop-blur-md pb-2 filter-container">
        <div class="sm:pr-6 flex w-full items-center justify-between bg-[var(--blackblue)]">
            <!-- Logo -->
            <a class="flex txt-btn-block items-center gap-3" href="{{ route('main', ['locale' => $locale]) }}">
                <x-front::ikony.logo class="w-[45px] sm:w-[70px] shrink-0 p-2 pr-0 sm:pr-2" />
                <h1 class="text-2xl sm:text-3xl font-bold text-white logo-font">Združenie VOTUM</h1>
            </a>

            <!-- Right controls -->
            <div class="flex items-center gap-4">

                <!-- Language switch (desktop only) -->
                <div class="desktop-locale">
                    <x-front::locale-switch />
                </div>

                <!-- Mobile toggle -->
                <button id="menu-toggle" aria-label="Toggle menu" class="hamburger p-2 rounded-full text-[var(--cream)] hover:bg-blue-800 transition z-[60] relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Desktop nav -->
        <div class="mt-2 desktop-nav-wrapper">
            <x-front::nav />
        </div>

    </div>
</header>

<!-- Single full-screen mobile menu (one element only) -->
<div id="mobile-menu" class="fixed bg-blue-950 left-0 w-full text-white hidden z-40 overflow-y-auto">
    <div class="bg-blue-950 pb-4 filter-container h-full">
        <div class="flex flex-col items-center gap-8 px-6 pt-5">

            <!-- Mobile font + locale controls (visible only on mobile) -->
            <div class="flex flex-row items-center gap-4 md:hidden">
                <x-front::locale-switch mobile />
            </div>

            <!-- Links -->
            <ul class="flex flex-col gap-6 text-center font-medium w-full text-xl">
                <li>
                    <a href="{{ route('main', ['locale' => $locale]) }}" class="flex justify-center items-center gap-3 hover:text-blue-300 txt-btn-block">
                        <x-front::ikony.home class="w-10 h-10" />
                        {{ __('nav.home') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('about', ['locale' => $locale]) }}" class="flex justify-center items-center gap-3 hover:text-blue-300 txt-btn-block">
                        <x-front::ikony.about class="w-10 h-10" />
                        {{ __('nav.about') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('events', ['locale' => $locale]) }}" class="flex justify-center items-center gap-3 hover:text-blue-300 txt-btn-block">
                        <x-front::ikony.event class="w-10 h-10" />
                        {{ __('nav.events') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('history', ['locale' => $locale]) }}" class="flex justify-center items-center gap-3 hover:text-blue-300 txt-btn-block">
                        <x-front::ikony.history class="w-10 h-10" />
                        {{ __('nav.history') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('support', ['locale' => $locale]) }}" class="flex justify-center items-center gap-3 hover:text-blue-300 txt-btn-block">
                        <x-front::ikony.support class="w-10 h-10" />
                        {{ __('nav.support') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('contacts', ['locale' => $locale]) }}" class="flex justify-center items-center gap-3 hover:text-blue-300 txt-btn-block">
                        <x-front::ikony.contact class="w-10 h-10" />
                        {{ __('nav.contacts') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('documents', ['locale' => $locale]) }}" class="flex justify-center items-center gap-3 hover:text-blue-300 txt-btn-block">
                        <x-front::ikony.document class="w-10 h-10" />
                        {{ __('nav.documents') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
