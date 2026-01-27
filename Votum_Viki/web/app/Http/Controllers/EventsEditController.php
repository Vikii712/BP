<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventsEditController extends Controller
{
    public function index()
    {
        $eventColors = [
            'c1' => '#FF0000',
            'c2' => '#FF7F00',
            'c3' => '#FFFF00',
            'c4' => '#00FF00',
            'c5' => '#0000FF',
            'c6' => '#4B0082',
            'c7' => '#8B00FF',
            'c8' => '#FF1493',
        ];

        $events = Event::with('dates')
            ->get()
            ->map(function ($event) {
                if ($event->dates->isNotEmpty()) {
                    $min = $event->dates->min('date');
                    $max = $event->dates->max('date');

                    $event->start_date = $min->format('d.m.Y');
                    $event->end_date   = $max->format('d.m.Y');
                }

                return $event;
            })
            ->sortByDesc(fn ($e) => $e->dates->max('date'))
            ->values();

        return view('pages.admin.events', compact('events', 'eventColors'));
    }

    public function create()
    {
        return view('pages.admin.event-form', [
            'event' => null,
            'isEdit' => false,
        ]);
    }

    public function edit(Event $event)
    {
        $event->load(['dates', 'sponsors', 'files']);

        return view('pages.admin.event-form', [
            'event' => $event,
            'isEdit' => true,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_sk' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_sk' => 'nullable|string',
            'content_en' => 'nullable|string',
            'calendarColor' => 'nullable|string|max:50',
            'dates' => 'nullable|string',
        ]);

        $event = Event::create([
            'title_sk'   => $validated['title_sk'],
            'title_en'   => $validated['title_en'],
            'content_sk' => $validated['content_sk'] ?? null,
            'content_en' => $validated['content_en'] ?? null,
            'color'      => $validated['calendarColor'] ?? null,
            'inCalendar' => $request->boolean('inCalendar'),
            'inHome'     => $request->boolean('inHome'),
            'inGallery'  => $request->boolean('inGallery'),
            'archived'   => $request->boolean('archived'),
        ]);

        if ($request->filled('dates')) {
            $dates = json_decode($request->dates, true);

            if (is_array($dates)) {
                foreach ($dates as $date) {
                    if (!$date) continue;

                    $event->dates()->create([
                        'date' => $date,
                    ]);
                }
            }
        }

        return redirect()->route('admin.events')
            ->with('success', 'Udalosť bola úspešne vytvorená.');

    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title_sk' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_sk' => 'nullable|string',
            'content_en' => 'nullable|string',
            'calendarColor' => 'nullable|string|max:50',
            'dates' => 'nullable|string',
        ]);

        $data = [
            'title_sk'   => $validated['title_sk'],
            'title_en'   => $validated['title_en'],
            'content_sk' => $validated['content_sk'] ?? null,
            'content_en' => $validated['content_en'] ?? null,
            'inCalendar' => $request->boolean('inCalendar'),
            'inHome'     => $request->boolean('inHome'),
            'inGallery'  => $request->boolean('inGallery'),
            'archived'   => $request->boolean('archived'),
        ];

        if ($request->filled('calendarColor')) {
            $data['color'] = $validated['calendarColor'];
        }

        $event->update($data);

        $event->dates()->delete();

        if ($request->filled('dates')) {
            $dates = json_decode($request->dates, true);

            if (is_array($dates)) {
                foreach ($dates as $date) {
                    if (!$date) continue;

                    $event->dates()->create([
                        'date' => $date,
                    ]);
                }
            }
        }

        foreach ($event->files()->where('type', 'document')->get() as $file) {
            if ($file->path) {
                Storage::disk('public')->delete($file->path);
            }
            $file->delete();
        }

        return redirect()->route('admin.events')
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


    public function unarchive(Event $event)
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
        foreach ($event->files()->get() as $file) {
            if ($file->path) {
                Storage::disk('public')->delete($file->path);
            }
        }

        $event->delete();

        return redirect()->route('admin.events')
            ->with('warning', 'Udalosť bola vymazaná.')
            ->with('deleted_event_id', $event->id);
    }

    public function restore($id)
    {
        $event = Event::withTrashed()->findOrFail($id);
        $event->restore();

        return redirect()->route('admin.events')
            ->with('success', 'Udalosť bola obnovená.');
    }

}
