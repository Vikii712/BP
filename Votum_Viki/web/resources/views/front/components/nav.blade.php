@php
    $locale = app()->getLocale();
@endphp

<nav aria-label="Primary navigation" id="main-nav" class="relative z-40 bg-blue-950">

    <ul class="flex text-white items-stretch">

        <li class="flex flex-1">
            <a href="{{ route('main', ['locale' => $locale]) }}"
               @class([
                   'flex flex-1 flex-col mx-1 items-center pb-0.5 rounded-lg txt-btn-block',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->routeIs('main'),
                   'hover:text-blue-300' => !request()->routeIs('main')
               ])
               @if(request()->routeIs('main')) aria-current="page" @endif>
                <x-front::ikony.home class="w-10 h-10 object-contain" />
                <span class="text-lg font-bold">{{ __('nav.home') }}</span>
            </a>
        </li>

        <li class="flex flex-1">
            <a href="{{ route('about', ['locale' => $locale]) }}"
               @class([
                   'flex flex-1 flex-col mx-1 items-center pb-0.5 rounded-lg txt-btn-block',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->routeIs('about'),
                   'hover:text-blue-300' => !request()->routeIs('about')
               ])
               @if(request()->routeIs('about')) aria-current="page" @endif>
                <x-front::ikony.about class="w-10 h-10 object-contain" />
                <span class="text-lg font-bold">{{ __('nav.about') }}</span>
            </a>
        </li>

        <li class="flex flex-1">
            <a href="{{ route('events', ['locale' => $locale]) }}"
               @class([
                   'flex flex-1 flex-col mx-1 items-center pb-0.5 rounded-lg txt-btn-block',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->routeIs('events'),
                   'hover:text-blue-300' => !request()->routeIs('events')
               ])
               @if(request()->routeIs('events')) aria-current="page" @endif>
                <x-front::ikony.event class="w-10 h-10 object-contain" />
                <span class="text-lg font-bold">{{ __('nav.events') }}</span>
            </a>
        </li>

        <li class="flex flex-1">
            <a href="{{ route('history', ['locale' => $locale]) }}"
               @class([
                   'flex flex-1 flex-col mx-1 items-center pb-0.5 rounded-lg txt-btn-block',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->routeIs('history'),
                   'hover:text-blue-300' => !request()->routeIs('history')
               ])
               @if(request()->routeIs('history')) aria-current="page" @endif>
                <x-front::ikony.history class="w-10 h-10 object-contain" />
                <span class="text-lg font-bold">{{ __('nav.history') }}</span>
            </a>
        </li>

        <li class="flex flex-1">
            <a href="{{ route('support', ['locale' => $locale]) }}"
               @class([
                   'flex flex-1 flex-col mx-1 items-center pb-0.5 rounded-lg txt-btn-block',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page'
                       => request()->is($locale . '/support*')
                       || request()->routeIs('financial')
                       || request()->routeIs('2percent')
                       || request()->routeIs('other'),
                   'hover:text-blue-300'
                       => !(request()->is($locale . '/support*')
                       || request()->routeIs('financial')
                       || request()->routeIs('2percent')
                       || request()->routeIs('other')),
               ])
               @if(request()->is($locale . '/support*') || request()->routeIs('financial') || request()->routeIs('2percent') || request()->routeIs('other'))
                   aria-current="page"
                @endif>
                <x-front::ikony.support class="w-10 h-10 object-contain" />
                <span class="text-lg font-bold">{{ __('nav.support') }}</span>
            </a>
        </li>

        <li class="flex flex-1">
            <a href="{{ route('contacts', ['locale' => $locale]) }}"
               @class([
                   'flex flex-1 flex-col mx-1 items-center pb-0.5 rounded-lg txt-btn-block',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->routeIs('contacts'),
                   'hover:text-blue-300' => !request()->routeIs('contacts')
               ])
               @if(request()->routeIs('contacts')) aria-current="page" @endif>
                <x-front::ikony.contact class="w-10 h-10 object-contain" />
                <span class="text-lg font-bold">{{ __('nav.contacts') }}</span>
            </a>
        </li>

        <li class="flex flex-1">
            <a href="{{ route('documents', ['locale' => $locale]) }}"
               @class([
                   'flex flex-1 flex-col mx-1 items-center pb-0.5 rounded-lg txt-btn-block',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->is($locale . '/documents*'),
                   'hover:text-blue-300' => !request()->is($locale . '/documents*')
               ])
               @if(request()->is($locale . '/documents*')) aria-current="page" @endif>
                <x-front::ikony.document class="w-10 h-10 object-contain" />
                <span class="text-lg font-bold">{{ __('nav.documents') }}</span>
            </a>
        </li>

    </ul>
</nav>
