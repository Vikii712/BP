<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class EventController
{
    public function events(Request $request)
    {
        $allEvents = collect([
            ['title' => 'Koncert na námetí', 'description' => 'Hudobné vystúpenie našich členov.', 'year' => 2026, 'date' => '2026-05-10', 'image' => 'images/event1.jpg'],
            ['title' => 'Tábor 2026', 'description' => 'Letný tábor pre mladých s aktivitami a podporou.', 'year' => 2026, 'date' => '2026-08-15', 'image' => 'images/event2.jpg'],
            ['title' => 'Tábor 2025', 'description' => 'Týždeň zábavy, učenia a priateľstiev.', 'year' => 2025, 'date' => '2025-08-10', 'image' => 'images/event3.jpg'],
            ['title' => 'Vystúpenie', 'description' => 'Verejná prezentácia projektov našich členov.', 'year' => 2022, 'date' => '2022-11-12', 'image' => 'images/event4.jpg'],
            // ... add more events here
        ]);

        $yearFilter = $request->get('year');
        if ($yearFilter) {
            $allEvents = $allEvents->where('year', $yearFilter);
        }

        $upcomingEvents = $allEvents->where('date', '>=', now()->toDateString());
        $pastEvents = $allEvents->where('date', '<', now()->toDateString())
            ->sortByDesc('date')
            ->groupBy('year');

        $page = $request->get('page', 1);
        $perPage = 5;
        $pagination = new LengthAwarePaginator(
            $pastEvents->flatten(1)->forPage($page, $perPage),
            $pastEvents->flatten(1)->count(),
            $perPage,
            $page,
            ['path' => url('events')]
        );

        return view('events', [
            'upcomingEvents' => $upcomingEvents,
            'groupedEvents' => $pastEvents,
            'years' => $allEvents->pluck('year')->unique()->sortDesc(),
            'pagination' => $pagination,
        ]);
    }
    public function show()
    {
        return view('event');
    }

}
