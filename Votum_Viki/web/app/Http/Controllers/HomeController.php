<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Section;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $locale = session('locale', 'sk');
        $isSK = $locale === 'sk';

        $heroData = Section::where('category', 'hero')->first();

        $hero = null;
        if ($heroData) {
            $hero = (object) [
                'title' => $isSK ? $heroData->title_sk : $heroData->title_en,
                'content' => $isSK ? $heroData->content_sk : $heroData->content_en,
            ];
        }

        $events = Event::with('dates')
            ->where('inCalendar', true)
            ->get()
            ->map(function ($event) use ($locale) {
                return [
                    'id' => $event->id,
                    'title' => $locale === 'sk' ? $event->title_sk : $event->title_en,
                    'description' => $locale === 'sk' ? $event->content_sk : $event->content_en,
                    'color' => $event->color,
                    'dates' => $event->dates->pluck('date')->map(function($date) {
                        return date('Y-m-d', strtotime($date));
                    })->toArray(),
                ];
            });

        return view('pages.main', [
            'hero' => $hero,
            'events' => $events,
        ]);
    }

    public function ics()
    {
        $events = Event::with('dates')
            ->where('inCalendar', true)
            ->get();

        if ($events->isEmpty()) {
            return response('ERROR: Ziadne udalosti v databaze')
                ->header('Content-Type', 'text/plain');
        }

        $ics = "BEGIN:VCALENDAR\r\n";
        $ics .= "VERSION:2.0\r\n";
        $ics .= "PRODID:-//VOTUM//Calendar//EN\r\n";
        $ics .= "CALSCALE:GREGORIAN\r\n";
        $ics .= "METHOD:PUBLISH\r\n";
        $ics .= "X-WR-CALNAME:VOTUM\r\n";
        $ics .= "X-WR-TIMEZONE:Europe/Bratislava\r\n";

        foreach ($events as $event) {
            foreach ($event->dates as $eventDate) {
                $date = \Carbon\Carbon::parse($eventDate->date);

                $dtstart = $date->format('Ymd');

                // Generovanie DTSTAMP/CREATED/LAST-MODIFIED v UTC (koniec na 'Z')
                $nowUtc = now()->setTimezone('UTC')->format('Ymd\THis\Z');
                $created = $event->created_at ?
                    \Carbon\Carbon::parse($event->created_at)->setTimezone('UTC')->format('Ymd\THis\Z') :
                    $nowUtc;

                // Google Calendar vyžaduje unikátny UID
                $uid = md5("votum-{$event->id}-{$dtstart}") . "@votum.sk";

                // Escapovanie pre Google Calendar
                $title = $this->escapeGoogleCalendar($event->title_sk ?? $event->title_en);

                $ics .= "BEGIN:VEVENT\r\n";
                $ics .= "UID:{$uid}\r\n";
                $ics .= "DTSTAMP:{$nowUtc}\r\n"; // Použijeme aktuálny čas pre DTSTAMP
                $ics .= "DTSTART;VALUE=DATE:{$dtstart}\r\n";

                // ZMENA 1: Používame DURATION:P1D (Perióda 1 deň) pre robustné jednodňové udalosti.
                // Toto je plne kompatibilné s VALUE=DATE a Google Kalendárom.
                $ics .= "DURATION:P1D\r\n";

                $ics .= "SUMMARY:{$title}\r\n";
                $ics .= "CREATED:{$created}\r\n";
                $ics .= "LAST-MODIFIED:{$created}\r\n";
                $ics .= "SEQUENCE:0\r\n";
                $ics .= "STATUS:CONFIRMED\r\n";
                $ics .= "TRANSP:TRANSPARENT\r\n";
                $ics .= "END:VEVENT\r\n";
            }
        }

        $ics .= "END:VCALENDAR\r\n";

        return response($ics)
            ->header('Content-Type', 'text/calendar; charset=utf-8')
            ->header('Content-Disposition', 'attachment; filename="votum.ics"')
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }


    private function escapeGoogleCalendar($text)
    {
        $text = strip_tags($text);

        $text = str_replace(["\r\n", "\n", "\r"], [" ", " ", " "], $text);
        $text = str_replace(['\\', ';', ','], ['\\\\', '\\;', '\\,'], $text);

        $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);

        $text = trim(preg_replace('/\s+/', ' ', $text));

        return $text;
    }
}
