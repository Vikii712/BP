<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class EventsController extends Controller
{
    public function index()
    {
        $locale = session('locale', 'sk');
        $today = Carbon::today();

        // EVENTS - načítať všetky eventy s inGallery = true
        $allEvents = Event::with('dates')
            ->where('inGallery', true)
            ->get()
            ->map(function ($event) use ($locale, $today) {
                $dates = $event->dates
                    ->pluck('date')
                    ->map(fn ($d) => Carbon::parse($d)->startOfDay())
                    ->sort()
                    ->values();

                $futureDates = $dates->filter(fn ($d) => $d->gte($today));
                $pastDates = $dates->filter(fn ($d) => $d->lt($today));

                // Určiť či je event upcoming alebo past
                $isUpcoming = $futureDates->isNotEmpty();

                // Pre upcoming použiť futureDates, pre past použiť pastDates
                $displayDates = $isUpcoming ? $futureDates : $pastDates;

                $dateLabel = $displayDates->count() === 1
                    ? $displayDates->first()->format('j. n.')
                    : ($displayDates->count() > 1
                        ? $displayDates->first()->format('j. n.') . ' – ' . $displayDates->last()->format('j. n.')
                        : '');

                // Rok pre past eventy (použiť posledný dátum)
                $year = $dates->isNotEmpty() ? $dates->last()->year : null;

                return (object)[
                    'id' => $event->id,
                    'title' => $locale === 'sk' ? $event->title_sk : $event->title_en,
                    'description' => $locale === 'sk' ? $event->content_sk : $event->content_en,
                    'dateLabel' => $dateLabel,
                    'year' => $year,
                    'isUpcoming' => $isUpcoming,
                    'inGallery' => (bool) $event->inGallery,
                    'inCalendar' => (bool) $event->inCalendar,
                    'inHome' => (bool) $event->inHome,
                ];
            });

        // Rozdeliť na upcoming a past
        $upcomingEvents = $allEvents->filter(fn($e) => $e->isUpcoming)->values();

        // Past eventy zoskupiť podľa rokov
        $pastEventsByYear = $allEvents
            ->filter(fn($e) => !$e->isUpcoming)
            ->groupBy('year')
            ->sortKeysDesc(); // Najnovšie roky najprv

        return view('pages.events', [
            'upcomingEvents' => $upcomingEvents,
            'pastEventsByYear' => $pastEventsByYear,
        ]);
    }
}
