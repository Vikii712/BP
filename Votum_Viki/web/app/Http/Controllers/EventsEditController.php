<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Date;
use Illuminate\Http\Request;

class EventsEditController extends Controller
{
    public function index()
    {
        // Farby pre kalendár
        $eventColors = [
            'c1' => '#ffd700',
            'c2' => '#cd42a4',
            'c3' => '#217e2b',
            'c4' => '#302caa',
            'c5' => '#7a2491',
            'c6' => '#9b1d1d',
            'c7' => '#42c3b6',
            'c8' => '#cd5d20',
        ];

        // Načítame udalosti s dátumami
        $events = Event::with('dates')->get()->map(function ($event) {
            if ($event->dates->isNotEmpty()) {
                $minDate = $event->dates->min('date');
                $maxDate = $event->dates->max('date');

                if ($minDate->eq($maxDate)) {
                    $event->start_date = $event->end_date = $minDate->format('d.m.Y');
                } else {
                    $event->start_date = $minDate->format('d.m.Y');
                    $event->end_date   = $maxDate->format('d.m.Y');
                }
            } else {
                $event->start_date = null;
                $event->end_date   = null;
            }

            $event->archived = $event->archived ?? false;
            $event->hasPage  = $event->hasPage ?? false;

            return $event;
        })
            ->sortByDesc(function($event) {
                return $event->dates->max('date'); // zoradenie od najnovšieho
            })
            ->values();

        return view('pages.admin.events', [
            'events' => $events,
            'eventColors' => $eventColors
        ]);
    }

    public function edit()
    {
        // Farby pre kalendár
        $eventColors = [
            'c1' => '#ffd700',
            'c2' => '#cd42a4',
            'c3' => '#217e2b',
            'c4' => '#302caa',
            'c5' => '#7a2491',
            'c6' => '#9b1d1d',
            'c7' => '#42c3b6',
            'c8' => '#cd5d20',
        ];

        // Načítame udalosti s dátumami
        $events = Event::with('dates')->get()->map(function ($event) {
            if ($event->dates->isNotEmpty()) {
                $event->start_date = $event->dates->min('date');
                $event->end_date = $event->dates->max('date');
            } else {
                $event->start_date = null;
                $event->end_date = null;
            }

            $event->archived = $event->archived ?? false;
            $event->hasPage = $event->hasPage ?? false;

            return $event;
        });

        return view('pages.admin.events', [
            'events' => $events,
            'eventColors' => $eventColors
        ]);
    }

    public function create()
    {
        // Presmerovanie na novú stránku pre pridanie udalosti
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        // TODO: uložiť novú udalosť
        return redirect()->route('admin.events')->with('success', 'Udalosť pridaná (zatiaľ prázdna)');
    }

    public function archive($eventId)
    {
        // TODO: archivovať udalosť
        return redirect()->route('admin.events')->with('success', "Udalosť $eventId archivovaná (zatiaľ prázdna)");
    }

    public function restore($eventId)
    {
        // TODO: obnoviť udalosť z archívu
        return redirect()->route('admin.events')->with('success', "Udalosť $eventId obnovená (zatiaľ prázdna)");
    }

    public function destroy($eventId)
    {
        // TODO: vymazať udalosť
        return redirect()->route('admin.events')->with('success', "Udalosť $eventId vymazaná (zatiaľ prázdna)");
    }
}
