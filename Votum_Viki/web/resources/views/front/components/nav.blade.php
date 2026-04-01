<nav aria-label="Primary navigation" id="main-nav" class="relative z-40 bg-blue-950">

    <ul class="flex text-white items-stretch">

        <li class="flex flex-1">
            <a href="{{ route('main') }}"
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
            <a href="{{ route('about') }}"
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
            <a href="{{ route('events') }}"
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
            <a href="{{ route('history') }}"
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
            <a href="{{ route('support') }}"
               @class([
                   'flex flex-1 flex-col mx-1 items-center pb-0.5 rounded-lg txt-btn-block',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page'
                       => request()->is('support*') || request()->routeIs('financial') || request()->routeIs('2percent') || request()->routeIs('other'),
                   'hover:text-blue-300'
                       => !(request()->is('support*') || request()->routeIs('financial') || request()->routeIs('2percent') || request()->routeIs('other')),
               ])
               @if(request()->is('support*') || request()->routeIs('financial') || request()->routeIs('2percent') || request()->routeIs('other'))
                   aria-current="page"
                @endif>
                <x-front::ikony.support class="w-10 h-10 object-contain" />
                <span class="text-lg font-bold">{{ __('nav.support') }}</span>
            </a>
        </li>

        <li class="flex flex-1">
            <a href="{{ route('contacts') }}"
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
            <a href="{{ asset('documents') }}"
               @class([
                   'flex flex-1 flex-col mx-1 items-center pb-0.5 rounded-lg txt-btn-block',
                   'border-b-4 border-blue-300 text-blue-200 font-extrabold aria-current-page' => request()->is('documents*'),
                   'hover:text-blue-300' => !request()->is('documents*')
               ])
               @if(request()->is('documents*')) aria-current="page" @endif>
                <x-front::ikony.document class="w-10 h-10 object-contain" />
                <span class="text-lg font-bold">{{ __('nav.documents') }}</span>
            </a>
        </li>

    </ul>
</nav>
