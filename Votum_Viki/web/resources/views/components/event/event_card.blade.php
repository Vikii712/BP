@props(['event','color' => true])

<div class="{{ $color ? 'bg-votum3 border-votum3' : 'bg-white border-votum1' }}
            mx-3 sm:mx-5 rounded-lg overflow-hidden shadow-lg border-3
            flex flex-col h-full">

    {{-- IMAGE --}}
    <div class="h-64 overflow-hidden m-5 mb-0">
        @if($event->main_pic)
            <img src="{{ asset('storage/'. $event->main_pic) }}"
                 alt="{{ $event->pic_alt }}"
                 loading="lazy"
                 width="400" height="250"
                 class="w-full h-full object-cover">
        @else
            <div class="bg-neutral-100 w-full h-full flex justify-center items-center">
                <img src="{{ asset('images/logoB.svg') }}"
                     alt="Logo Združenia Votum"
                     class="w-40 h-40">
            </div>
        @endif
    </div>

    {{-- CONTENT --}}
    <div class="pt-3 p-6 flex flex-col flex-1">

        <h3 class="h3 font-bold text-votum-blue mb-2 text-center">
            {{ $event->title }}
        </h3>

        <p class="txt font-semibold text-votum-blue mb-4 text-lg text-center">
            {{ $event->dateLabel }}
        </p>

        {{-- Button vždy dole --}}
        <a href="{{ route('event', $event->id) }}"
           class="mt-auto w-full text-center txt-btn text-bold
                  {{ $color ? 'bg-dark-votum3' : 'bg-dark-votum1' }}
                  text-white px-7 py-4 rounded-lg">
            {{ __('nav.more') }} <i class="pl-2 fas fa-arrow-right"></i>
        </a>

    </div>
</div>
