<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

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
                    ? $displayDates->first()->format('j. n. Y')
                    : ($displayDates->count() > 1
                        ? $displayDates->first()->format('j. n. Y') . ' – ' . $displayDates->last()->format('j. n. Y')
                        : '');

                // Rok pre past eventy (použiť posledný dátum)
                $year = $dates->isNotEmpty() ? $dates->last()->year : null;

                return (object)[
                    'id' => $event->id,
                    'title' => $locale === 'sk' ? $event->title_sk : $event->title_en,
                    'description' => $locale === 'sk' ? $event->content_sk : $event->content_en,
                    'main_pic' => $event->main_pic,
                    'pic_alt' => $locale === 'sk' ? $event->pic_alt_sk : $event->pic_alt_en,
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

    public function event($id)
    {
        $locale = session('locale', 'sk');

        $event = Event::with([
            'dates',
            'sponsors.file',
            'files'
        ])->findOrFail($id);

        // dátumy
        $dates = $event->dates
            ->pluck('date')
            ->map(fn ($d) => Carbon::parse($d)->startOfDay())
            ->sort()
            ->values();

        $dateLabel = $dates->count() === 1
            ? $dates->first()->format('j. n. Y')
            : ($dates->count() > 1
                ? $dates->first()->format('j. n. Y') . ' – ' . $dates->last()->format('j. n. Y')
                : '');

        $photoLink = $event->files->firstWhere('type', 'image');
        $videos    = $event->files->where('type', 'video');
        $documents = $event->files->where('type', 'document');

        $documents = $documents->map(function ($doc) use ($locale) {

            $doc->title = $locale === 'sk'
                ? $doc->title_sk
                : $doc->title_en;

            if ($doc->url && Storage::disk('public')->exists($doc->url)) {
                $doc->size_kb = round(Storage::disk('public')->size($doc->url) / 1024);
                $doc->download_url = asset('storage/' . $doc->url);
                $doc->file_type = strtolower(pathinfo($doc->url, PATHINFO_EXTENSION));
            } else {
                $doc->size_kb = null;
                $doc->download_url = null;
                $doc->file_type = null;
            }

            return $doc;
        });


        return view('pages.event', [
            'event'       => $event,
            'title'       => $locale === 'sk' ? $event->title_sk : $event->title_en,
            'description' => $locale === 'sk' ? $event->content_sk : $event->content_en,
            'dateLabel'   => $dateLabel,

            'sponsors'    => $event->sponsors,
            'photoLink'   => $photoLink,
            'videos'      => $videos,
            'documents'   => $documents,
        ]);
    }


}
