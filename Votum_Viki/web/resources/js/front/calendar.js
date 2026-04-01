document.addEventListener('DOMContentLoaded', () => {
    const root = document.getElementById('events');
    if (!root) return;

    const calendarEvents = window.calendarEvents || [];
    const locale = window.appLocale || 'sk';

    const eventItemTemplate = document.getElementById('eventItemTemplate');
    const noEventsTemplate = document.getElementById('noEventsTemplate');
    const calendarDayTemplate = document.getElementById('calendarDayTemplate');
    const calendarBarTemplate = document.getElementById('calendarBarTemplate');

    const calendarGrid = document.getElementById('calendarGrid');
    const currentMonth = document.getElementById('currentMonth');
    const eventsListTitle = document.getElementById('eventsListTitle');
    const eventsList = document.getElementById('eventsList');
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    const prevEventBtn = document.getElementById('prevEvent');
    const nextEventBtn = document.getElementById('nextEvent');

    let currentDate = new Date();
    let eventIndex = 0;

    const monthNames = {
        sk: ['Január', 'Február', 'Marec', 'Apríl', 'Máj', 'Jún', 'Júl', 'August', 'September', 'Október', 'November', 'December'],
        en: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
    }[locale] || ['Január', 'Február', 'Marec', 'Apríl', 'Máj', 'Jún', 'Júl', 'August', 'September', 'Október', 'November', 'December'];

    const eventColors = {
        c1: '#C0152A',
        c2: '#C45E00',
        c3: '#A07800',
        c4: '#1A7A2E',
        c5: '#1040A0',
        c6: '#5B2D8E',
        c7: '#A0008A',
        c8: '#B5006A',
    };

    function normalizeDate(dateStr) {
        return dateStr.split('T')[0];
    }

    function createEmptyCell() {
        return document.createElement('div');
    }

    function createCalendarBar(color, title) {
        const fragment = calendarBarTemplate.content.cloneNode(true);
        const bar = fragment.querySelector('.calendar-bar');

        bar.style.backgroundColor = color;
        bar.title = title;

        return fragment;
    }

    function createCalendarDay(day, dayEvents) {
        const fragment = calendarDayTemplate.content.cloneNode(true);
        const dayNumber = fragment.querySelector('.calendar-day-number');
        const barsContainer = fragment.querySelector('.calendar-day-bars');

        dayNumber.textContent = day;

        if (!dayEvents.length) {
            barsContainer.remove();
            return fragment;
        }

        dayEvents.forEach(event => {
            const color = eventColors[event.color] || '#999';
            barsContainer.appendChild(createCalendarBar(color, event.title));
        });

        return fragment;
    }

    function createEventItem(event, index) {
        const fragment = eventItemTemplate.content.cloneNode(true);
        const item = fragment.querySelector('.event-item');
        const date = fragment.querySelector('.event-date');
        const title = fragment.querySelector('.event-title');
        const link = fragment.querySelector('.event-link');

        const color = eventColors[event.color] || '#cccccc';
        const hasGallery = Boolean(event.inGallery);

        item.style.display = index < 3 ? 'flex' : 'none';
        item.style.backgroundColor = '#fff';
        item.style.border = `8px solid ${color}`;

        date.textContent = event.dateLabel ?? '';
        title.textContent = event.title ?? '';

        if (hasGallery) {
            link.href = `/event/${event.id}`;
            link.classList.remove('hidden');
            link.style.display = '';
            link.removeAttribute('hidden');
        } else {
            link.classList.add('hidden');
            link.style.display = 'none';
            link.setAttribute('hidden', 'hidden');
            link.removeAttribute('href');
        }

        return fragment;
    }

    function createNoEventsMessage() {
        return noEventsTemplate.content.cloneNode(true);
    }

    function generateCalendar(year, month) {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const adjustedStart = (firstDay.getDay() + 6) % 7;

        calendarGrid.innerHTML = '';

        for (let i = 0; i < adjustedStart; i++) {
            calendarGrid.appendChild(createEmptyCell());
        }

        for (let day = 1; day <= lastDay.getDate(); day++) {
            const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

            const dayEvents = calendarEvents.filter(event =>
                event.dates?.some(date => normalizeDate(date) === dateString)
            );

            calendarGrid.appendChild(createCalendarDay(day, dayEvents));
        }

        const monthTitle = `${monthNames[month]} ${year}`;
        currentMonth.textContent = monthTitle;
        eventsListTitle.textContent = monthTitle;
    }

    function getEventsForMonth(year, month) {
        return calendarEvents.filter(event => {
            if (!event.dates) return false;

            return event.dates.some(date => {
                const parsed = new Date(normalizeDate(date));
                return parsed.getFullYear() === year && parsed.getMonth() === month;
            });
        });
    }

    function updateEventsPagination() {
        const items = eventsList.querySelectorAll('.event-item');

        items.forEach((item, index) => {
            item.style.display = (index >= eventIndex && index < eventIndex + 3) ? 'flex' : 'none';
        });

        prevEventBtn.style.display = eventIndex > 0 ? 'block' : 'none';
        nextEventBtn.style.display = eventIndex + 3 < items.length ? 'block' : 'none';
    }

    function renderEventsForMonth(year, month) {
        eventsList.innerHTML = '';
        eventIndex = 0;

        const events = getEventsForMonth(year, month);

        if (!events.length) {
            eventsList.appendChild(createNoEventsMessage());
            prevEventBtn.style.display = 'none';
            nextEventBtn.style.display = 'none';
            return;
        }

        events.forEach((event, index) => {
            eventsList.appendChild(createEventItem(event, index));
        });

        updateEventsPagination();
    }

    function navigate(monthDelta) {
        currentDate.setMonth(currentDate.getMonth() + monthDelta);
        generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
        renderEventsForMonth(currentDate.getFullYear(), currentDate.getMonth());
    }

    prevMonthBtn?.addEventListener('click', () => navigate(-1));
    nextMonthBtn?.addEventListener('click', () => navigate(1));

    prevEventBtn?.addEventListener('click', () => {
        eventIndex -= 3;
        updateEventsPagination();
    });

    nextEventBtn?.addEventListener('click', () => {
        eventIndex += 3;
        updateEventsPagination();
    });

    generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
    renderEventsForMonth(currentDate.getFullYear(), currentDate.getMonth());
});
