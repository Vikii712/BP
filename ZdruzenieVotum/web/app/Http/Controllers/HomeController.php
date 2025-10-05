<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // --- sample events (replace with DB/Eloquent in production) ---
        $events = [
            ['id' => 1, 'title' => 'Koncert',     'date' => '2025-08-09', 'description' => 'Open-air concert for community.'],
            ['id' => 2, 'title' => 'Vystúpenie', 'date' => '2025-08-20', 'description' => 'Community performance.'],
            ['id' => 3, 'title' => 'Tábor',       'date' => '2025-08-29', 'description' => 'Summer camp.'],
        ];

        // featured & team placeholders
        $featured = [
            ['title' => 'Tábor 2024',    'image' => '/images/tabor-placeholder.jpg',    'excerpt' => 'A summer camp full of fun and learning.'],
            ['title' => 'Koncert 2023',  'image' => '/images/koncert-placeholder.jpg',  'excerpt' => 'A memorable concert with local bands.'],
        ];

        $team = [
            'image' => '/images/team-placeholder.jpg',
            'alt'   => 'VOTUM team group photo'
        ];

        // ------------- Build a simple month-calendar array -------------
        // target month (from your wireframe): August 2025
        $year  = 2025;
        $month = 8;

        $start = Carbon::create($year, $month, 1);
        $startWeekday = $start->dayOfWeekIso; // 1 = Monday
        $daysInMonth = $start->daysInMonth;

        // quick lookup of event dates (Y-m-d)
        $eventDates = array_map(function ($e) {
            return Carbon::parse($e['date'])->format('Y-m-d');
        }, $events);

        // create a 6x7 grid (42 cells) where each cell is an associative array:
        // ['day' => int|null, 'date' => 'Y-m-d'|null, 'event' => bool]
        $cells = array_fill(0, 42, ['day' => null, 'date' => null, 'event' => false]);

        for ($d = 1; $d <= $daysInMonth; $d++) {
            $index = ($startWeekday - 1) + ($d - 1); // position within 0..41
            $date = Carbon::create($year, $month, $d);
            $iso  = $date->format('Y-m-d');

            $cells[$index] = [
                'day'   => $d,
                'date'  => $iso,
                'event' => in_array($iso, $eventDates),
            ];
        }

        $calendar   = $cells;
        $monthLabel = $start->format('F Y'); // e.g. "August 2025" (use locale formatting if you want SK)

        // pass everything to the view
        return view('home', compact('events', 'featured', 'team', 'calendar', 'monthLabel'));
    }

    public function setLocale(Request $request)
    {
        $locale = $request->post('locale') === 'en' ? 'en' : 'sk';
        Session::put('locale', $locale);
        App::setLocale($locale);
        return redirect()->back();
    }

    public function calendarIcs()
    {
        $events = [
            ['title' => 'Koncert', 'start' => '2025-08-09', 'end' => '2025-08-09', 'desc' => 'Open-air concert.'],
            ['title' => 'Vystúpenie', 'start' => '2025-08-20', 'end' => '2025-08-20', 'desc' => 'Community performance.'],
            ['title' => 'Tábor', 'start' => '2025-08-29', 'end' => '2025-08-29', 'desc' => 'Summer camp.'],
        ];

        $lines = [
            'BEGIN:VCALENDAR',
            'VERSION:2.0',
            'PRODID:-//VOTUM//EN'
        ];

        foreach ($events as $e) {
            $uid = (string) Str::uuid();
            $dtstart = Carbon::parse($e['start'])->format('Ymd');
            $dtend   = Carbon::parse($e['end'])->addDay()->format('Ymd'); // ICS end is non-inclusive
            $lines[] = 'BEGIN:VEVENT';
            $lines[] = "UID:{$uid}";
            $lines[] = "DTSTAMP:" . now()->utc()->format('Ymd\THis\Z');
            $lines[] = "DTSTART;VALUE=DATE:{$dtstart}";
            $lines[] = "DTEND;VALUE=DATE:{$dtend}";
            $lines[] = "SUMMARY:{$e['title']}";
            $lines[] = "DESCRIPTION:{$e['desc']}";
            $lines[] = 'END:VEVENT';
        }

        $lines[] = 'END:VCALENDAR';
        $content = implode("\r\n", $lines);

        return response($content, 200, [
            'Content-Type' => 'text/calendar; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="votum-events.ics"'
        ]);
    }
}
