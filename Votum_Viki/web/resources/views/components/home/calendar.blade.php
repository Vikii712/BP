@props(['calendarEvents', 'upcomingEvents'])
@php
    $titles = $upcomingEvents
        ->pluck('title')
        ->implode('. ');
@endphp

<section class="bg-white py-12" id="events">
    <div class="w-full px-2 sm:px-8 lg:px-16">
        <div class="flex justify-center">
            <div class="inline-flex items-center gap-3 mb-10">
                <h2 class="h2 font-bold text-votum-blue underline underline-offset-4 ">
                    {{ __('nav.nextUp') }}
                </h2>

                <x-listen text="{{ __('nav.nextUp') . $titles }}" :down="true" :relative="true"/>
            </div>
        </div>


        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Calendar -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <button id="prevMonth" class="txt-btn-block p-4 bg-votum-blue text-white text-2xl md:text-3xl rounded-lg">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <h3 id="currentMonth" class="h3 font-bold text-votum-blue text-center flex-1"></h3>
                    <button id="nextMonth" class="txt-btn-block p-4 bg-votum-blue text-white rounded-lg text-2xl md:text-3xl">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <div class="bg-votum2 rounded-lg p-2 sm:p-4 border-4 border-votum2">
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
                   class="mt-4 w-full bg-votum-blue text-white py-2 rounded-lg txt-btn-block">
                    <i class="fas fa-calendar-plus mr-2 py-6"></i>{{ __('nav.save') }}
                </a>
            </div>

            <!-- Events List -->
            <div>
                <div class="flex justify-between items-center mb-4">
                    <button id="prevEvent" class="txt-btn-block p-4 bg-votum-blue text-white rounded-lg text-2xl md:text-3xl" style="display: none;">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <h3 class="h3 font-bold text-votum-blue text-center flex-1">{{ __('nav.next') }}</h3>
                    <button id="nextEvent" class="txt-btn-block p-4 bg-votum-blue text-white rounded-lg text-2xl md:text-3xl" style="display: none;">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <div id="eventsList" class="space-y-4">
                    <!--JS render -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Calendar events - použiť len tie s inCalendar = true
    const calendarEvents = @json($calendarEvents);
    const upcomingEvents = @json($upcomingEvents);
    let currentDate = new Date();
    let eventIndex = 0;

    const locale = '{{ session("locale", "sk") }}';
    const monthNames = {
        'sk': ['Január','Február','Marec','Apríl','Máj','Jún','Júl','August','September','Október','November','December'],
        'en': ['January','February','March','April','May','June','July','August','September','October','November','December']
    }[locale];

    const eventColors = {
        'c1': '#FF0000', // červená
        'c2': '#FF7F00', // oranžová
        'c3': '#FFFF00', // žltá
        'c4': '#00FF00', // zelená
        'c5': '#0000FF', // modrá
        'c6': '#4B0082', // indigo
        'c7': '#8B00FF', // fialová
        'c8': '#FF1493', // ružová
    };

    function normalizeDate(dateStr) {
        // dateStr už je v formáte 'Y-m-d' z controllera
        return dateStr.split('T')[0];
    }

    function generateCalendar(year, month) {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const startingDayOfWeek = firstDay.getDay();
        const adjustedStart = startingDayOfWeek === 0 ? 6 : startingDayOfWeek - 1;

        const calendarGrid = document.getElementById('calendarGrid');
        calendarGrid.innerHTML = '';

        // Prázdne bunky pred prvým dňom mesiaca
        for(let i=0; i<adjustedStart; i++) {
            calendarGrid.appendChild(document.createElement('div'));
        }

        // Dni v mesiaci
        for(let day=1; day<=lastDay.getDate(); day++){
            const dateString = `${year}-${String(month+1).padStart(2,'0')}-${String(day).padStart(2,'0')}`;
            const dayCell = document.createElement('div');
            dayCell.className = `calendar-day text-center sm:text-lg sm:p-1 rounded border-2 border-votum2 bg-white flex flex-col`;
            dayCell.style.position = 'relative';
            dayCell.style.minHeight = '60px';

            const dayNumber = document.createElement('div');
            dayNumber.textContent = day;
            dayNumber.className = 'font-bold';
            dayCell.appendChild(dayNumber);

            // Použiť calendarEvents - nájsť eventy pre tento deň
            const dayEvents = calendarEvents.filter(e => {
                if (!e.dates) return false;
                return e.dates.some(d => normalizeDate(d) === dateString);
            });

            if(dayEvents.length > 0){
                const barsContainer = document.createElement('div');
                barsContainer.className = 'flex-1 flex flex-col justify-between sm:gap-0.5 mt-1';
                dayEvents.forEach(e => {
                    const bar = document.createElement('div');
                    bar.style.backgroundColor = eventColors[e.color] || '#999';
                    bar.style.height = `${100/dayEvents.length}%`;
                    bar.style.flex = '1';
                    bar.style.minHeight = '4px';
                    bar.title = e.title;
                    barsContainer.appendChild(bar);
                });
                dayCell.appendChild(barsContainer);
            }

            calendarGrid.appendChild(dayCell);
        }

        document.getElementById('currentMonth').textContent = `${monthNames[month]} ${year}`;
    }

    function updateEventsPagination() {
        const eventItems = document.querySelectorAll('.event-item');
        const totalEvents = eventItems.length;

        if (totalEvents === 0) return;

        // Skryť všetky eventy
        eventItems.forEach(item => {
            item.style.display = 'none';
        });

        // Zobraziť 2 eventy od eventIndex
        for (let i = eventIndex; i < Math.min(eventIndex + 2, totalEvents); i++) {
            if (eventItems[i]) {
                eventItems[i].style.display = 'flex';
            }
        }

        // Aktualizovať viditeľnosť tlačidiel
        document.getElementById('prevEvent').style.display = eventIndex > 0 ? 'block' : 'none';
        document.getElementById('nextEvent').style.display = eventIndex + 2 < totalEvents ? 'block' : 'none';
    }

    function renderEventsForMonth(year, month) {
        const eventsList = document.getElementById('eventsList');
        eventsList.innerHTML = '';
        eventIndex = 0;

        const filtered = upcomingEvents.filter(e => {
            const eventDate = new Date(e.date);
            return eventDate.getFullYear() === year &&
                eventDate.getMonth() === month;
        });

        if (filtered.length === 0) {
            eventsList.innerHTML = `<p class="text-center txt">{{ __('nav.noEvents') }}</p>`;
            return;
        }

        filtered.forEach((event, index) => {
            const div = document.createElement('div');
            div.className = 'event-item bg-votum2 p-4 rounded-lg flex flex-col gap-4 border-4 border-votum2';
            div.style.display = index < 2 ? 'flex' : 'none';

            div.innerHTML = `
            <div class="flex flex-col w-full gap-1 text-center">
                <h4 class="font-bold text-votum-blue txt">${event.title}</h4>
                <p class="txt font-semibold">${event.dateLabel}</p>
                ${event.inGallery ? `
                    <a href="/event/${event.id}" class="txt-btn mt-3 rounded-xl bg-white text-votum-blue border-3 border-votum2 w-full text-center py-2">
                        {{ __('nav.more') }} <i class="pl-2 fas fa-arrow-right"></i>
                    </a>
                ` : ''}
            </div>
        `;

            eventsList.appendChild(div);
        });

        updateEventsPagination();
    }

    document.getElementById('prevMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
        renderEventsForMonth(currentDate.getFullYear(), currentDate.getMonth());
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
        renderEventsForMonth(currentDate.getFullYear(), currentDate.getMonth());
    });

    document.getElementById('prevEvent').addEventListener('click', () => {
        if (eventIndex > 0) {
            eventIndex -= 2;
            updateEventsPagination();
        }
    });

    document.getElementById('nextEvent').addEventListener('click', () => {
        eventIndex += 2;
        updateEventsPagination();
    });

    // Inicializácia
    generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
    renderEventsForMonth(currentDate.getFullYear(), currentDate.getMonth());
    updateEventsPagination();
</script>
