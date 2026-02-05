<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;


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
        $event->load(['dates', 'sponsors.file', 'files']);

        // Priprav video URL ako array
        $videoUrls = $event->files()
            ->where('type', 'video')
            ->pluck('url')
            ->toArray();

        // Priprav gallery_url (ak máš len 1 fotogalériu)
        $galleryUrl = $event->files()
            ->where('type', 'image')
            ->value('url');

        // Priprav dokumenty
        $documents = $event->files()
            ->where('type', 'document')
            ->get();

        return view('pages.admin.event-form', [
            'event' => $event,
            'isEdit' => true,
            'videoUrls' => $videoUrls,
            'galleryUrl' => $galleryUrl,
            'documents' => $documents,
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

        /* -------- DATES -------- */
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

        /* -------- PHOTO LINK (1× image) -------- */
        if ($request->filled('gallery_url')) {
            $event->files()->create([
                'type' => 'image',
                'url'  => $request->gallery_url,
            ]);
        }

        /* -------- VIDEOS -------- */
        if ($request->filled('video_url')) {
            foreach ($request->video_url as $url) {
                if (!$url) continue;

                $event->files()->create([
                    'type' => 'video',
                    'url'  => $url,
                ]);
            }
        }

        /* -------- DOCUMENTS -------- */
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $i => $file) {
                if (!$file) continue;

                $path = $file->store('documents', 'public');

                $event->files()->create([
                    'type' => 'document',
                    'url' => $path,
                    'title_sk' => $request->doc_name_sk[$i] ?? null,
                    'title_en' => $request->doc_name_en[$i] ?? null,
                ]);
            }
        }

        /* -------- SPONSORS -------- */
        if ($request->filled('sponsors')) {
            foreach ($request->sponsors as $i => $name) {
                if (!$name) continue;

                $fileId = null;

                if ($request->hasFile('sponsor_images') && isset($request->file('sponsor_images')[$i])) {
                    $logo = $request->file('sponsor_images')[$i];
                    $path = $logo->store('sponsors', 'public');

                    $file = File::create([
                        'type' => 'image',
                        'url' => $path,
                    ]);

                    $fileId = $file->id;
                }

                $sponsor = Sponsor::create([
                    'name' => $name,
                    'file_id' => $fileId,
                ]);

                $event->sponsors()->attach($sponsor->id);
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
            'inCalendar' => $request->boolean('inCalendar'),
            'inHome'     => $request->boolean('inHome'),
            'inGallery'  => $request->boolean('inGallery'),
            'archived'   => $request->boolean('archived'),
        ];

        if ($request->boolean('inGallery')) {
            $data['content_sk'] = $validated['content_sk'] ?? null;
            $data['content_en'] = $validated['content_en'] ?? null;
        }

        if ($request->filled('calendarColor')) {
            $data['color'] = $validated['calendarColor'];
        }

        $event->update($data);

        /* -------- RESET DATES -------- */
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

        /* -------- RESET FILES -------- */
        foreach ($event->files as $file) {
            if ($file->type === 'document') {
                Storage::disk('public')->delete($file->url);
            }
            $file->delete();
        }

        /* -------- RESET SPONSORS -------- */
        $event->sponsors()->detach();

        /* -------- RE-ADD FILES & SPONSORS (same as store) -------- */

        if ($request->filled('gallery_url')) {
            $event->files()->create([
                'type' => 'image',
                'url' => $request->gallery_url,
            ]);
        }

        if ($request->filled('video_url')) {
            foreach ($request->video_url as $url) {
                if (!$url) continue;

                $event->files()->create([
                    'type' => 'video',
                    'url' => $url,
                ]);
            }
        }

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $i => $file) {
                if (!$file) continue;

                $path = $file->store('documents', 'public');

                $event->files()->create([
                    'type' => 'document',
                    'url' => $path,
                    'title_sk' => $request->doc_name_sk[$i] ?? null,
                    'title_en' => $request->doc_name_en[$i] ?? null,
                ]);
            }
        }

        if ($request->filled('sponsors')) {
            foreach ($request->sponsors as $i => $name) {
                if (!$name) continue;

                $fileId = null;

                if ($request->hasFile('sponsor_images') && isset($request->file('sponsor_images')[$i])) {
                    $logo = $request->file('sponsor_images')[$i];
                    $path = $logo->store('sponsors', 'public');

                    $file = File::create([
                        'type' => 'image',
                        'url' => $path,
                    ]);

                    $fileId = $file->id;
                }

                $sponsor = Sponsor::create([
                    'name' => $name,
                    'file_id' => $fileId,
                ]);

                $event->sponsors()->attach($sponsor->id);
            }
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
