<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Section;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $locale = session('locale', 'sk');
        $isSK = $locale === 'sk';

        // --- HERO ---
        $heroData = Section::where('category', 'hero')->first();
        $hero = null;
        $heroImage = null;

        if ($heroData) {
            $hero = (object) [
                'title' => $isSK ? $heroData->title_sk : $heroData->title_en,
                'content' => $isSK ? $heroData->content_sk : $heroData->content_en,
            ];

            $image = DB::table('files')
                ->where('section_id', $heroData->id)
                ->where('type', 'image')
                ->first();

            if ($image) {
                $heroImage = (object) [
                    'url' => $image->url,
                    'alt' => $isSK ? $image->title_sk : $image->title_en,
                ];
            }
        }


        // --- TEAM ---
        $teamData = Section::where('category', 'ourTeam')->first();
        $team = null;
        $teamImage = null;

        if ($teamData) {
            $team = (object) [
                'title' => $isSK ? $teamData->title_sk : $teamData->title_en,
                'content' => $isSK ? $teamData->content_sk : $teamData->content_en,
            ];

            $image = DB::table('files')
                ->where('section_id', $teamData->id)
                ->where('type', 'image')
                ->first();

            if ($image) {
                $teamImage = (object) [
                    'url' => $image->url,
                    'alt' => $isSK ? $image->title_sk : $image->title_en,
                ];
            }
        }


        // --- EVENTS ---
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
            'heroImage' => $heroImage,
            'team' => $team,
            'teamImage' => $teamImage,
            'events' => $events,
        ]);

    }

    // --- ICS GENERATOR ---
    public function ics()
    {
        $events = Event::with('dates')->where('inCalendar', true)->get();

        if ($events->isEmpty()) {
            return response('ERROR: Žiadne udalosti v databáze')
                ->header('Content-Type', 'text/plain');
        }

        $CRLF = "\r\n";

        $ics = "BEGIN:VCALENDAR{$CRLF}";
        $ics .= "PRODID:-//VOTUM//Calendar//SK{$CRLF}";
        $ics .= "VERSION:2.0{$CRLF}";
        $ics .= "CALSCALE:GREGORIAN{$CRLF}";
        $ics .= "METHOD:PUBLISH{$CRLF}";
        $ics .= "X-WR-CALNAME:VOTUM{$CRLF}";
        $ics .= "X-WR-TIMEZONE:Europe/Bratislava{$CRLF}";

        // Pridanie VTIMEZONE (voliteľné, ale pomáha s kompatibilitou)
        $ics .= "BEGIN:VTIMEZONE{$CRLF}";
        $ics .= "TZID:Europe/Bratislava{$CRLF}";
        $ics .= "X-LIC-LOCATION:Europe/Bratislava{$CRLF}";
        $ics .= "BEGIN:DAYLIGHT{$CRLF}";
        $ics .= "TZOFFSETFROM:+0100{$CRLF}";
        $ics .= "TZOFFSETTO:+0200{$CRLF}";
        $ics .= "TZNAME:CEST{$CRLF}";
        $ics .= "DTSTART:19700329T020000{$CRLF}";
        $ics .= "RRULE:FREQ=YEARLY;BYMONTH=3;BYDAY=-1SU{$CRLF}";
        $ics .= "END:DAYLIGHT{$CRLF}";
        $ics .= "BEGIN:STANDARD{$CRLF}";
        $ics .= "TZOFFSETFROM:+0200{$CRLF}";
        $ics .= "TZOFFSETTO:+0100{$CRLF}";
        $ics .= "TZNAME:CET{$CRLF}";
        $ics .= "DTSTART:19701025T030000{$CRLF}";
        $ics .= "RRULE:FREQ=YEARLY;BYMONTH=10;BYDAY=-1SU{$CRLF}";
        $ics .= "END:STANDARD{$CRLF}";
        $ics .= "END:VTIMEZONE{$CRLF}";

        // Debug: Spočítaj počet eventov
        $eventCount = 0;

        foreach ($events as $event) {
            if (!$event->dates || $event->dates->isEmpty()) {
                continue; // Preskočiť eventy bez dátumov
            }

            foreach ($event->dates as $eventDate) {
                $eventCount++;

                $start = \Carbon\Carbon::parse($eventDate->date)->format('Ymd');
                $end = \Carbon\Carbon::parse($eventDate->date)->addDay()->format('Ymd');
                $nowUtc = now()->utc()->format('Ymd\THis\Z');
                $uid = "votum-{$event->id}-{$eventDate->id}@votum.sk";

                $title = $this->escapeIcsText($event->title_sk ?? $event->title_en ?? 'Bez názvu');
                $description = $this->escapeIcsText($event->content_sk ?? '');

                $ics .= "BEGIN:VEVENT{$CRLF}";
                $ics .= "DTSTART;VALUE=DATE:{$start}{$CRLF}";
                $ics .= "DTEND;VALUE=DATE:{$end}{$CRLF}";
                $ics .= "DTSTAMP:{$nowUtc}{$CRLF}";
                $ics .= "UID:{$uid}{$CRLF}";
                $ics .= "SUMMARY:{$title}{$CRLF}";

                if (!empty($description)) {
                    $ics .= "DESCRIPTION:{$description}{$CRLF}";
                }

                $ics .= "STATUS:CONFIRMED{$CRLF}";
                $ics .= "TRANSP:TRANSPARENT{$CRLF}"; // Pridané ako vo FIIT kalendári
                $ics .= "END:VEVENT{$CRLF}";
            }
        }

        $ics .= "END:VCALENDAR{$CRLF}";

        // Debug log
        \Log::info("Generated ICS with {$eventCount} events, size: " . strlen($ics) . " bytes");

        return response($ics)
            ->header('Content-Type', 'text/calendar; charset=utf-8')
            ->header('Content-Disposition', 'attachment; filename="votum.ics"')
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    private function escapeIcsText($text)
    {
        $text = strip_tags($text);
        // Najprv escapovať backslashe, potom ostatné
        $text = str_replace('\\', '\\\\', $text);
        $text = str_replace([';', ','], ['\\;', '\\,'], $text);
        $text = str_replace(["\r\n", "\n", "\r"], '\\n', $text);

        // Zalamovanie dlhých riadkov (ICS limit je 75 znakov)
        return $this->foldLine($text);
    }

    private function foldLine($text, $maxLength = 75)
    {
        if (strlen($text) <= $maxLength) {
            return $text;
        }

        $result = '';
        $line = '';

        foreach (mb_str_split($text) as $char) {
            $line .= $char;
            if (strlen($line) >= $maxLength) {
                $result .= $line . "\r\n ";
                $line = '';
            }
        }

        return $result . $line;
    }

}
