<?php

namespace App\Http\Controllers\Front;

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

        // --- VŠETKY GALLERY EVENTS ---
        $allEvents = Event::with('dates')
            ->where('inGallery', true)
            ->get()
            ->map(function ($event) use ($locale, $today) {
                $datesRaw = $event->dates;

                $dates = $datesRaw
                    ->pluck('date')
                    ->map(fn ($d) => Carbon::parse($d)->startOfDay())
                    ->sort()
                    ->values();

                $futureDates = $dates->filter(fn ($d) => $d->gte($today));
                $displayDates = $futureDates->isNotEmpty() ? $futureDates : $dates;

                $hasExact = $datesRaw->contains('exact', true);

                if (!$hasExact) {
                    $dateLabel = $displayDates->first()?->format('Y') ?? '';
                } else {
                    $dateLabel = $displayDates->count() === 1
                        ? $displayDates->first()->format('j. n. Y')
                        : $displayDates->first()->format('j. n. Y') . ' – ' . $displayDates->last()->format('j. n. Y');
                }

                $isUpcoming = $futureDates->isNotEmpty();

                // pre minulé eventy chceme radiť podľa posledného dátumu
                $year = $dates->isNotEmpty() ? $dates->last()->year : null;
                $sortDate = $dates->isNotEmpty() ? $dates->last() : null;

                return (object) [
                    'id' => $event->id,
                    'title' => $locale === 'sk' ? $event->title_sk : $event->title_en,
                    'description' => $locale === 'sk' ? $event->content_sk : $event->content_en,
                    'color' => $event->color,
                    'dates' => $dates->map(fn ($d) => $d->format('Y-m-d'))->values(),
                    'dateLabel' => $dateLabel,
                    'main_pic' => $event->main_pic,
                    'pic_alt' => $locale === 'sk' ? $event->pic_alt_sk : $event->pic_alt_en,
                    'year' => $year,
                    'sortDate' => $sortDate,
                    'isUpcoming' => $isUpcoming,
                    'inCalendar' => (bool) $event->inCalendar,
                    'inGallery' => (bool) $event->inGallery,
                    'inHome' => (bool) $event->inHome,
                ];
            });

        // --- UPCOMING EVENTS PRE ZOZNAM NAD KALENDÁROM ---
        $upcomingEvents = $allEvents
            ->filter(fn ($e) => $e->isUpcoming)
            ->values();

        // --- PAST EVENTS SO STRÁNKOVANÍM ---
        $eventsPerPage = 20;

        $allPastEvents = $allEvents->filter(fn ($e) => !$e->isUpcoming);

        $totalEvents = $allPastEvents->count();
        $currentPage = max(1, (int) request('page', 1));
        $totalPages = (int) ceil($totalEvents / $eventsPerPage);
        $currentPage = min($currentPage, $totalPages ?: 1);

        $pagedEvents = $allPastEvents
            ->sortByDesc('sortDate')
            ->slice(($currentPage - 1) * $eventsPerPage, $eventsPerPage)
            ->values();

        $pastEventsByYear = $pagedEvents
            ->groupBy('year')
            ->sortKeysDesc();

        // --- CALENDAR EVENTS ROVNAKO AKO NA HOME ---
        $calendarEvents = $allEvents
            ->filter(fn ($e) => $e->inCalendar)
            ->values();

        $calendarTitles = $allEvents
            ->filter(fn ($e) => $e->inCalendar)
            ->filter(function ($e) use ($today) {
                return collect($e->dates)
                    ->map(fn ($d) => Carbon::parse($d))
                    ->contains(fn ($d) => $d->gte($today));
            })
            ->map(fn ($e) => $e->dateLabel . ' ' . $e->title)
            ->implode('. ');

        return view('front::pages.events', [
            'upcomingEvents' => $upcomingEvents,
            'pastEventsByYear' => $pastEventsByYear,
            'calendarEvents' => $calendarEvents,
            'calendarTitles' => $calendarTitles,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
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

        // dátumy – $event->dates sú Eloquent modely, exact je dostupný priamo
        $datesRaw = $event->dates->sort()->values();

        $hasExact = $datesRaw->contains('exact', true);

        if (!$hasExact) {
            // iba rok (žiadny rozsah)
            $dateLabel = $datesRaw->first()?->date ? Carbon::parse($datesRaw->first()->date)->format('Y') : '';
        } else {
            // presné dátumy (môže byť rozsah)
            $parsedDates = $datesRaw
                ->pluck('date')
                ->map(fn ($d) => Carbon::parse($d)->startOfDay())
                ->sort()
                ->values();

            $dateLabel = $parsedDates->count() === 1
                ? $parsedDates->first()->format('j. n. Y')
                : ($parsedDates->count() > 1
                    ? $parsedDates->first()->format('j. n. Y') . ' – ' . $parsedDates->last()->format('j. n. Y')
                    : '');
        }

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

        return view('front::pages.event', [
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
