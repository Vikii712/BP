<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function download(Request $request)
    {
        // For demo, we'll create a simple event. In real app accept event id.
        $title = $request->query('title', 'VOTUM Event');
        $date = $request->query('date', date('Y-m-d'));

        $start = Carbon::parse($date)->setTime(10, 0);
        $end = (clone $start)->addHours(2);

        $uid = uniqid('votum_');

        $ics = "BEGIN:VCALENDAR\r\n";
        $ics .= "VERSION:2.0\r\n";
        $ics .= "PRODID:-//VOTUM//EN\r\n";
        $ics .= "BEGIN:VEVENT\r\n";
        $ics .= "UID:{$uid}\r\n";
        $ics .= "DTSTAMP:" . gmdate('Ymd\THis\Z') . "\r\n";
        $ics .= "DTSTART:" . $start->format('Ymd\THis') . "\r\n";
        $ics .= "DTEND:" . $end->format('Ymd\THis') . "\r\n";
        $ics .= "SUMMARY:{$title}\r\n";
        $ics .= "END:VEVENT\r\n";
        $ics .= "END:VCALENDAR\r\n";

        $response = new StreamedResponse(function() use ($ics) {
            echo $ics;
        });

        $response->headers->set('Content-Type', 'text/calendar; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="votum-event.ics"');

        return $response;
    }
}
