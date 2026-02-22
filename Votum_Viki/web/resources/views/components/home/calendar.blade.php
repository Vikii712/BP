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

                <div class="rounded-lg p-2 sm:p-4 border-4" style="border-color:#172554;background-color:#dbeafe;">
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
                <h3 id="eventsListTitle" class="h3 font-bold text-votum-blue text-center mb-4">{{ __('nav.next') }}</h3>

                <div id="eventsList" class="space-y-4">
                    <!--JS render -->
                </div>

                <!-- Pagination arrows – dole pod udalosťami -->
                <div class="flex justify-between items-center mt-4">
                    <button id="prevEvent" class="txt-btn-block p-4 bg-votum-blue text-white rounded-lg text-2xl md:text-3xl" style="display:none;">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <span class="flex-1"></span>
                    <button id="nextEvent" class="txt-btn-block p-4 bg-votum-blue text-white rounded-lg text-2xl md:text-3xl" style="display:none;">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
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
        'c1': '#C0152A', // tmavá červená
        'c2': '#C45E00', // tmavá oranžová
        'c3': '#A07800', // tmavá zlatá
        'c4': '#1A7A2E', // tmavá zelená
        'c5': '#1040A0', // tmavá modrá
        'c6': '#5B2D8E', // tmavá fialová
        'c7': '#A0008A', // tmavá purpurová
        'c8': '#B5006A', // tmavá ružová
    };

    function normalizeDate(dateStr) {
        return dateStr.split('T')[0];
    }

    function generateCalendar(year, month) {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const adjustedStart = (firstDay.getDay() + 6) % 7;

        const calendarGrid = document.getElementById('calendarGrid');
        calendarGrid.innerHTML = '';

        for (let i = 0; i < adjustedStart; i++) {
            calendarGrid.appendChild(document.createElement('div'));
        }

        for (let day = 1; day <= lastDay.getDate(); day++) {
            const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            const dayCell = document.createElement('div');
            dayCell.className = 'calendar-day text-center sm:text-lg sm:p-1 rounded border-2 border-votum2 bg-white flex flex-col';
            dayCell.style.cssText = 'position:relative;min-height:60px';

            const dayNumber = document.createElement('div');
            dayNumber.textContent = day;
            dayNumber.className = 'font-bold';
            dayCell.appendChild(dayNumber);

            const dayEvents = calendarEvents.filter(e => e.dates?.some(d => normalizeDate(d) === dateString));

            if (dayEvents.length > 0) {
                const barsContainer = document.createElement('div');
                barsContainer.className = 'flex-1 flex flex-col justify-between sm:gap-0.5 mt-1';
                dayEvents.forEach(e => {
                    const bar = document.createElement('div');
                    bar.style.cssText = `background-color:${eventColors[e.color] || '#999'};flex:1;min-height:4px`;
                    bar.title = e.title;
                    barsContainer.appendChild(bar);
                });
                dayCell.appendChild(barsContainer);
            }

            calendarGrid.appendChild(dayCell);
        }

        document.getElementById('currentMonth').textContent = `${monthNames[month]} ${year}`;
        document.getElementById('eventsListTitle').textContent = `${monthNames[month]} ${year}`;
    }

    function getEventsForMonth(year, month) {
        return calendarEvents.filter(e => {
            if (!e.dates) return false;
            return e.dates.some(d => {
                const date = new Date(normalizeDate(d));
                return date.getFullYear() === year && date.getMonth() === month;
            });
        }).map(e => {
            const upcoming = upcomingEvents.find(u => u.id === e.id);
            // Zachováme color z calendarEvent aj po merge s upcoming
            return upcoming ? { ...upcoming, color: e.color } : e;
        });
    }

    function updateEventsPagination() {
        const items = document.querySelectorAll('.event-item');
        items.forEach((item, i) => {
            item.style.display = (i >= eventIndex && i < eventIndex + 3) ? 'flex' : 'none';
        });
        document.getElementById('prevEvent').style.display = eventIndex > 0 ? 'block' : 'none';
        document.getElementById('nextEvent').style.display = eventIndex + 3 < items.length ? 'block' : 'none';
    }

    function renderEventsForMonth(year, month) {
        const eventsList = document.getElementById('eventsList');
        eventsList.innerHTML = '';
        eventIndex = 0;

        const events = getEventsForMonth(year, month);

        if (events.length === 0) {
            eventsList.innerHTML = `<p class="text-center txt">{{ __('nav.noEvents') }}</p>`;
            document.getElementById('prevEvent').style.display = 'none';
            document.getElementById('nextEvent').style.display = 'none';
            return;
        }

        events.forEach((event, index) => {
            const color = eventColors[event.color] || '#cccccc';
            const div = document.createElement('div');
            div.className = 'event-item p-5 rounded-lg flex flex-col gap-4';
            // Bledosivé pozadie + farebný border podľa farby v kalendári
            div.style.cssText = `display:${index < 3 ? 'flex' : 'none'};background-color:#f3f4f6;border:8px solid ${color}`;
            div.innerHTML = `
                <div class="flex flex-col w-full gap-1 text-center">
                    <h4 class="font-bold text-votum-blue txt">${event.title}</h4>
                    <p class="txt font-semibold">${event.dateLabel ?? event.date ?? ''}</p>
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

    function navigate(monthDelta) {
        currentDate.setMonth(currentDate.getMonth() + monthDelta);
        generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
        renderEventsForMonth(currentDate.getFullYear(), currentDate.getMonth());
    }

    document.getElementById('prevMonth').addEventListener('click', () => navigate(-1));
    document.getElementById('nextMonth').addEventListener('click', () => navigate(1));
    document.getElementById('prevEvent').addEventListener('click', () => { eventIndex -= 3; updateEventsPagination(); });
    document.getElementById('nextEvent').addEventListener('click', () => { eventIndex += 3; updateEventsPagination(); });

    generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
    renderEventsForMonth(currentDate.getFullYear(), currentDate.getMonth());
</script>
