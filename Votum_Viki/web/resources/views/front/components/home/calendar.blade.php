@props(['calendarEvents', 'calendarTitles'])

<x-front::wave/>

<section class="bg-blue-100 py-12" id="events">
    <div class="w-full px-2 sm:px-8 lg:px-16">
        <div class="flex justify-center">
            <div class="inline-flex items-center gap-3 mb-10 flex-wrap">
                <h2 class="h2 sentence font-bold text-votum-blue ">
                    {{ __('nav.nextUp') }}
                </h2>

                <x-front::listen text="{{ __('nav.nextUp') . $calendarTitles }}" :down="true"/>            </div>
        </div>


        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Calendar -->
            <div>

                <div class="grid grid-cols-2 sm:grid-cols-3 items-center mb-4">

                    <!-- Ľavá šípka -->
                    <button id="prevMonth"
                            aria-label="Predchádzajúci mesiac"
                            class="order-2 sm:order-1 justify-self-start txt-btn-block p-4 bg-votum-blue text-white text-2xl md:text-3xl rounded-lg">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <!-- Mesiac -->
                    <h3 id="currentMonth"
                        class="order-1 sm:order-2 col-span-2 sm:col-span-1 h3 sentence font-bold text-votum-blue text-center">
                        <!-- dynamický mesiac -->
                    </h3>

                    <!-- Pravá šípka -->
                    <button id="nextMonth"
                            aria-label="Nasledujúci mesiac"
                            class="order-3 justify-self-end sm:justify-self-end txt-btn-block p-4 bg-votum-blue text-white text-2xl md:text-3xl rounded-lg">
                        <i class="fas fa-chevron-right"></i>
                    </button>

                </div>

                <div class="rounded-lg p-2 sm:p-4 border-4" style="border-color:#172554;background-color:#fff;">
                    <div class="grid grid-cols-7 gap-1 sm:gap-2 mb-4">
                        <div class="text-center font-bold text-lg">{{ __('nav.po') }}</div>
                        <div class="text-center font-bold text-lg">{{ __('nav.ut') }}</div>
                        <div class="text-center font-bold text-lg">{{ __('nav.st') }}</div>
                        <div class="text-center font-bold text-lg">{{ __('nav.stv') }}</div>
                        <div class="text-center font-bold text-lg">{{ __('nav.pi') }}</div>
                        <div class="text-center font-bold text-lg">{{ __('nav.so') }}</div>
                        <div class="text-center font-bold text-lg">{{ __('nav.ne') }}</div>
                    </div>

                    <div id="calendarGrid" class="grid grid-cols-7 gap-1 sm:gap-2"></div>
                </div>

                <a href="https://calendar.google.com/calendar/render?cid={{ urlencode(route('calendar.ics', absolute: true)) }}"
                   target="_blank"
                   class="mt-4 w-full bg-votum-blue text-white rounded-lg txt-btn flex flex-wrap items-center justify-center text-center"
                >
                    <i class="fas fa-calendar-plus"></i>
                    <span>{{ __('nav.save') }}</span>
                </a>
            </div>

            <!-- Events List -->
            <div>
                <h3 id="eventsListTitle"
                    class="h3 sentence font-bold text-votum-blue text-center mb-4">{{ __('nav.next') }}</h3>

                <div id="eventsList" class="space-y-4">
                    <!--JS render -->
                </div>

                <!-- Pagination arrows – dole pod udalosťami -->
                <div class="flex justify-between items-center mt-4">
                    <button
                            id="prevEvent"
                            class="txt-btn-block p-4 bg-votum-blue text-white text-2xl md:text-3xl rounded-lg"
                            aria-label="Predchádzajúce udalosti">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                    </button>

                    <button
                            id="nextEvent"
                            class="txt-btn-block p-4 bg-votum-blue text-white rounded-lg text-2xl md:text-3xl"
                            aria-label="Nasledujúce udalosti">
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<x-front::wave :inverted="true"/>



<template id="eventItemTemplate">
    <div class="event-item p-5 rounded-lg flex flex-col gap-4">
        <div class="flex flex-col w-full gap-1 text-center">
            <p class="event-date txt font-semibold"></p>
            <h4 class="event-title font-bold text-votum-blue sentence txt"></h4>
            <a class="event-link txt-btn mt-3 rounded-xl bg-white text-votum-blue border-3 border-votum2 w-full text-center py-2 hidden">
                {{ __('nav.more') }} <i class="pl-2 fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</template>

<template id="noEventsTemplate">
    <p class="text-center sentence txt">{{ __('nav.noEvents') }}</p>
</template>

<template id="calendarDayTemplate">
    <div class="calendar-day text-center text-xs sm:text-sm md:text-lg p-0.5 sm:p-1 rounded border-2 border-votum2 bg-white flex flex-col min-h-[40px] sm:min-h-[50px] md:min-h-[60px]">
        <div class="calendar-day-number font-bold"></div>
        <div class="calendar-day-bars flex-1 flex flex-col justify-between sm:gap-0.5 mt-1"></div>
    </div>
</template>

<template id="calendarBarTemplate">
    <div class="calendar-bar" style="flex:1; min-height:4px;"></div>
</template>

<script>
    window.calendarEvents = @json($calendarEvents);
    window.appLocale = @json(session('locale', 'sk'));
</script>
