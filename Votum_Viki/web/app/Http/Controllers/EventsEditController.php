<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Date;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class EventsEditController extends Controller
{
    public function index()
    {
        // Farby pre kalendár
        $eventColors = [
            'c1' => '#FF0000', // červená
            'c2' => '#FF7F00', // oranžová
            'c3' => '#FFFF00', // žltá
            'c4' => '#00FF00', // zelená
            'c5' => '#0000FF', // modrá
            'c6' => '#4B0082', // indigo
            'c7' => '#8B00FF', // fialová
            'c8' => '#FF1493', // ružová
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

            return $event;
        })
            ->sortByDesc(function($event) {
                return $event->dates->max('date');
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

            return $event;
        });

        return view('pages.admin.events', [
            'events' => $events,
            'eventColors' => $eventColors
        ]);
    }

    public function create()
    {
        return view('pages.admin.new-event');
    }

    public function store(Request $request)
    {
        $request->merge([
            'inCalendar' => $request->has('inCalendar'),
            'inHome'     => $request->has('inHome'),
            'inGallery'  => $request->has('inGallery'),
            'archived'   => $request->has('archived'),
        ]);

        // 1) Validácia
        $validated = $request->validate([
            'title_sk' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',

            'content_sk' => 'nullable|string',
            'content_en' => 'nullable|string',

            'inCalendar' => 'sometimes|boolean',

            'inHome' => 'sometimes|boolean',
            'inGallery' => 'sometimes|boolean',

            'calendarColor' => 'nullable|string|max:50',
            'archived' => 'sometimes|boolean',

            'main_pic' => 'nullable|image|max:2048',

            'dates' => 'nullable|string',
            'sponsors' => 'nullable|array',
            'sponsors.*' => 'nullable|string|max:255',
            'sponsor_images' => 'nullable|array',
            'sponsor_images.*' => 'nullable|image|max:2048',
        ]);



        // 2) Vytvorenie eventu (len stĺpce z $fillable)
        $event = Event::create([
            'title_sk'   => $validated['title_sk'],
            'title_en'   => $validated['title_en'],
            'content_sk' => $validated['content_sk'] ?? null,
            'content_en' => $validated['content_en'] ?? null,

            'inCalendar' => $validated['inCalendar'],
            'inHome'     => $validated['inHome'],
            'inGallery'  => $validated['inGallery'],

            'archived'   => $request->has('archived'),
            'color'      => $validated['calendarColor'] ?? null,
            'main_pic'   => null,
        ]);


        // 3) Hlavný obrázok
        if ($request->hasFile('main_pic')) {
            $path = $request->file('main_pic')->store('events', 'public');
            $event->update([
                'main_pic' => $path,
            ]);
        }

        // 4) Dátumy (vzťah)
        if (!empty($request->dates)) {
            $dates = json_decode($request->dates, true);

            if (is_array($dates)) {
                foreach ($dates as $date) {
                    $event->dates()->create([
                        'date' => \Carbon\Carbon::createFromFormat('d.m.Y', $date),
                    ]);
                }
            }
        }

        // 5) Sponzori (vzťah + pivot)
        if (!empty($request->sponsors)) {
            foreach ($request->sponsors as $i => $name) {
                if (empty($name)) {
                    continue;
                }

                $sponsor = Sponsor::firstOrCreate([
                    'name' => $name,
                ]);

                // Logo sponzora
                if (
                    isset($request->sponsor_images[$i]) &&
                    $request->file('sponsor_images')[$i]->isValid()
                ) {
                    $filePath = $request->file('sponsor_images')[$i]
                        ->store('sponsors', 'public');

                    $file = $sponsor->file()->create([
                        'url' => $filePath,
                    ]);

                    $sponsor->update([
                        'file_id' => $file->id,
                    ]);
                }

                // Pivot tabuľka
                $event->sponsors()->syncWithoutDetaching($sponsor->id);
            }
        }

        return redirect()
            ->route('admin.events')
            ->with('success', 'Udalosť bola úspešne uložená.');
    }




    public function archive(Event $event)
    {
        $event->update([
            'inCalendar' => false,
            'inHome'     => false,
            'inGallery'  => false,
            'archived'   => true,
        ]);

        return redirect()
            ->route('admin.events')
            ->with('success', 'Udalosť bola archivovaná.');
    }


    public function restore(Event $event)
    {
        $event->update([
            'archived' => false,
        ]);

        return redirect()
            ->route('admin.events')
            ->with('success', 'Udalosť bola obnovená.');
    }


    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()
            ->route('admin.events')
            ->with('success', 'Udalosť bola odstránená.');
    }

}
