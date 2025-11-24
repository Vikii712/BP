<nav aria-label="Primary navigation" id="main-nav" class="relative z-40 bg-blue-950">

    <ul class="hidden lg:flex justify-evenly text-[var(--cream)]">

        <li>
            <a href="{{ route('main') }}"
               @class([
                   'flex flex-col items-center px-3 pb-0.5  rounded-lg pt-2',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->routeIs('main'),
                   'hover:text-blue-300' => !request()->routeIs('main')
               ])
               @if(request()->routeIs('main')) aria-current="page" @endif>
                <img src="{{ asset('images/domov.svg') }}" alt="ikona domov"
                     class="w-7 h-7 mb-1 object-contain">
                <span class="text-md md:text-base font-bold">{{ __('nav.home') }}</span>
            </a>
        </li>

        <li>
            <a href="{{ route('about') }}"
               @class([
                   'flex flex-col items-center px-3 pb-0.5  rounded-lg pt-2',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->routeIs('about'),
                   'hover:text-blue-300' => !request()->routeIs('about')
               ])
               @if(request()->routeIs('about')) aria-current="page" @endif>
                <img src="{{ asset('images/Onas.svg') }}" alt="ikona o nás"
                     class="w-7 h-7 mb-1 object-contain">
                <span class="text-md md:text-base font-bold">{{ __('nav.about') }}</span>
            </a>
        </li>

        <li>
            <a href="{{ route('events') }}"
               @class([
                   'flex flex-col items-center px-3 pb-0.5  rounded-lg pt-2',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->routeIs('events'),
                   'hover:text-blue-300' => !request()->routeIs('events')
               ])
               @if(request()->routeIs('events')) aria-current="page" @endif>
                <img src="{{ asset('images/udalosti.svg') }}" alt="ikona udalosti"
                     class="w-7 h-7 mb-1 object-contain">
                <span class="text-md md:text-base font-bold">{{ __('nav.events') }}</span>
            </a>
        </li>

        <li>
            <a href="{{ route('history') }}"
               @class([
                   'flex flex-col items-center px-3 pb-0.5  rounded-lg pt-2',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->routeIs('history'),
                   'hover:text-blue-300' => !request()->routeIs('history')
               ])
               @if(request()->routeIs('history')) aria-current="page" @endif>
                <img src="{{ asset('images/historia.svg') }}" alt="ikona historie"
                     class="w-7 h-7 mb-1 object-contain">
                <span class="text-md md:text-base font-bold">{{ __('nav.history') }}</span>
            </a>
        </li>

        <li>
            <a href="{{ route('support') }}"
               @class([
                   'flex flex-col items-center px-3 pb-0.5  rounded-lg pt-2',

                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page'
                       => request()->is('support*') || request()->routeIs('financial') || request()->routeIs('2percent') || request()->routeIs('other'),

                   'hover:text-blue-300'
                       => !(request()->is('support*') || request()->routeIs('financial') || request()->routeIs('2percent') || request()->routeIs('other')),
               ])

               @if(request()->is('support*') || request()->routeIs('financial') || request()->routeIs('2percent') || request()->routeIs('other'))
                   aria-current="page"
                @endif
            >
                <img src="{{ asset('images/podpora.svg') }}" alt="ikona podpory"
                     class="w-7 h-7 mb-1 object-contain">
                <span class="text-md md:text-base font-bold">{{ __('nav.support') }}</span>
            </a>
        </li>

        <li>
            <a href="{{ route('contacts') }}"
               @class([
                   'flex flex-col items-center px-3 pb-0.5  rounded-lg pt-2',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->routeIs('contacts'),
                   'hover:text-blue-300' => !request()->routeIs('contacts')
               ])
               @if(request()->routeIs('contacts')) aria-current="page" @endif>
                <img src="{{ asset('images/kontakty.svg') }}" alt="ikona kontaktov"
                     class="w-7 h-7 mb-1 object-contain">
                <span class="text-md md:text-base font-bold">{{ __('nav.contacts') }}</span>
            </a>
        </li>

        <li>
            <a href="{{ asset('documents') }}"
               @class([
                   'flex flex-col items-center px-3 pb-0.5  rounded-lg pt-2',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->is('documents*'),
                   'hover:text-blue-300' => !request()->is('documents*')
               ])
               @if(request()->is('documents*')) aria-current="page" @endif>
                <img src="{{ asset('images/dokumenty.svg') }}" alt="ikona dokumentov"
                     class="w-7 h-7 mb-1 object-contain">
                <span class="text-md md:text-base font-bold">{{ __('nav.documents') }}</span>
            </a>
        </li>

    </ul>
</nav>
