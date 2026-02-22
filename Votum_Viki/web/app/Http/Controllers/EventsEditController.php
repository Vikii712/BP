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
        $sponsors = Sponsor::all();
        return view('pages.admin.event-form', [
            'event'       => null,
            'isEdit'      => false,
            'allSponsors' => $sponsors,
        ]);
    }

    public function edit(Event $event)
    {
        $event->load(['dates', 'sponsors.file', 'files']);
        $sponsors = Sponsor::all();

        return view('pages.admin.event-form', [
            'event'       => $event,
            'isEdit'      => true,
            'allSponsors' => $sponsors,
            'videoUrls'   => $event->files()->where('type', 'video')->pluck('url')->toArray(),
            'galleryUrl'  => $event->files()->where('type', 'image')->value('url'),
            'documents'   => $event->files()->where('type', 'document')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_sk'      => 'required|string|max:255',
            'title_en'      => 'required|string|max:255',
            'content_sk'    => 'nullable|string',
            'content_en'    => 'nullable|string',
            'calendarColor' => 'nullable|string|max:50',
            'dates'         => 'nullable|string',
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
                    $event->dates()->create(['date' => $date]);
                }
            }
        }

        /* -------- MAIN IMAGE -------- */
        if ($request->hasFile('main_pic')) {
            $path = $request->file('main_pic')->store('events', 'public');

            $event->update([
                'main_pic'   => $path,
                'pic_alt_sk' => $request->pic_alt_sk,
                'pic_alt_en' => $request->pic_alt_en,
            ]);
        }

        /* -------- GALLERY URL -------- */
        if ($request->filled('gallery_url')) {
            $event->files()->create([
                'type' => 'image',
                'url'  => $request->gallery_url,
            ]);
        }

        /* -------- VIDEOS -------- */
        if ($request->filled('video_url')) {
            foreach ($request->video_url as $iframeHtml) {
                if (!$iframeHtml) continue;

                // extrahujeme src z iframe
                if (preg_match('/src="([^"]+)"/', $iframeHtml, $matches)) {
                    $url = $matches[1]; // samotná URL z src

                    $event->files()->create([
                        'type' => 'video',
                        'url'  => $url,
                    ]);
                }
            }
        }


        /* -------- DOCUMENTS -------- */
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $i => $file) {
                if (!$file) continue;

                $path = $file->store('documents', 'public');

                $event->files()->create([
                    'type'     => 'document',
                    'url'      => $path,
                    'title_sk' => $request->doc_name_sk[$i] ?? null,
                    'title_en' => $request->doc_name_en[$i] ?? null,
                ]);
            }
        }

        /* -------- SPONSORS -------- */
        $existingIds   = $request->existing_sponsor_ids ?? [];
        $newSponsorIds = [];

        // Aktualizuj mená existujúcich sponzorov
        if ($request->filled('existing_sponsor_names')) {
            foreach ($request->existing_sponsor_names as $sponsorId => $name) {
                $sponsor = Sponsor::find($sponsorId);
                if (!$sponsor || !$name) continue;
                $sponsor->update(['name' => $name]);
            }
        }

        // Aktualizuj logá existujúcich sponzorov
        if ($request->hasFile('existing_sponsor_images')) {
            foreach ($request->file('existing_sponsor_images') as $sponsorId => $logo) {
                $sponsor = Sponsor::find($sponsorId);
                if (!$sponsor) continue;

                if ($sponsor->file_id) {
                    $oldFile = File::find($sponsor->file_id);
                    if ($oldFile) {
                        Storage::disk('public')->delete($oldFile->url);
                        $oldFile->delete();
                    }
                }

                $path = $logo->store('sponsors', 'public');
                $file = File::create(['type' => 'image', 'url' => $path]);
                $sponsor->update(['file_id' => $file->id]);
            }
        }

        // Vytvor nových sponzorov
        if ($request->filled('sponsors')) {
            foreach ($request->sponsors as $i => $name) {
                if (!$name) continue;

                $fileId = null;

                if ($request->hasFile('sponsor_images') && isset($request->file('sponsor_images')[$i])) {
                    $logo   = $request->file('sponsor_images')[$i];
                    $path   = $logo->store('sponsors', 'public');
                    $file   = File::create(['type' => 'image', 'url' => $path]);
                    $fileId = $file->id;
                }

                $sponsor         = Sponsor::create(['name' => $name, 'file_id' => $fileId]);
                $newSponsorIds[] = $sponsor->id;
            }
        }

        $event->sponsors()->sync(array_merge($existingIds, $newSponsorIds));

        return redirect()->route('admin.events')
            ->with('success', 'Udalosť bola úspešne vytvorená.');
    }


    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title_sk'      => 'required|string|max:255',
            'title_en'      => 'required|string|max:255',
            'content_sk'    => 'nullable|string',
            'content_en'    => 'nullable|string',
            'calendarColor' => 'nullable|string|max:50',
            'dates'         => 'nullable|string',
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

        /* -------- MAIN IMAGE -------- */
        if ($request->remove_image == '1') {
            if ($event->main_pic) {
                Storage::disk('public')->delete($event->main_pic);
            }

            $event->update([
                'main_pic'   => null,
                'pic_alt_sk' => null,
                'pic_alt_en' => null,
            ]);
        }

        if ($request->hasFile('main_pic')) {
            if ($event->main_pic) {
                Storage::disk('public')->delete($event->main_pic);
            }

            $path = $request->file('main_pic')->store('events', 'public');

            $event->update([
                'main_pic'   => $path,
                'pic_alt_sk' => $request->pic_alt_sk,
                'pic_alt_en' => $request->pic_alt_en,
            ]);
        }

        /* -------- RESET DATES -------- */
        $event->dates()->delete();

        if ($request->filled('dates')) {
            $dates = json_decode($request->dates, true);

            if (is_array($dates)) {
                foreach ($dates as $date) {
                    if (!$date) continue;
                    $event->dates()->create(['date' => $date]);
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

        /* -------- RE-ADD FILES -------- */
        if ($request->filled('gallery_url')) {
            $event->files()->create([
                'type' => 'image',
                'url'  => $request->gallery_url,
            ]);
        }

        if ($request->filled('video_url')) {
            foreach ($request->video_url as $iframeHtml) {
                if (!$iframeHtml) continue;

                // extrahujeme src z iframe
                if (preg_match('/src="([^"]+)"/', $iframeHtml, $matches)) {
                    $url = $matches[1]; // toto je samotný link z src

                    $event->files()->create([
                        'type' => 'video',
                        'url'  => $url,
                    ]);
                }
            }
        }

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $i => $file) {
                if (!$file) continue;

                $path = $file->store('documents', 'public');

                $event->files()->create([
                    'type'     => 'document',
                    'url'      => $path,
                    'title_sk' => $request->doc_name_sk[$i] ?? null,
                    'title_en' => $request->doc_name_en[$i] ?? null,
                ]);
            }
        }

        /* -------- SPONSORS -------- */
        $existingIds   = $request->existing_sponsor_ids ?? [];
        $newSponsorIds = [];

        // Aktualizuj mená existujúcich sponzorov
        if ($request->filled('existing_sponsor_names')) {
            foreach ($request->existing_sponsor_names as $sponsorId => $name) {
                $sponsor = Sponsor::find($sponsorId);
                if (!$sponsor || !$name) continue;
                $sponsor->update(['name' => $name]);
            }
        }

        // Aktualizuj logá existujúcich sponzorov
        if ($request->hasFile('existing_sponsor_images')) {
            foreach ($request->file('existing_sponsor_images') as $sponsorId => $logo) {
                $sponsor = Sponsor::find($sponsorId);
                if (!$sponsor) continue;

                if ($sponsor->file_id) {
                    $oldFile = File::find($sponsor->file_id);
                    if ($oldFile) {
                        Storage::disk('public')->delete($oldFile->url);
                        $oldFile->delete();
                    }
                }

                $path = $logo->store('sponsors', 'public');
                $file = File::create(['type' => 'image', 'url' => $path]);
                $sponsor->update(['file_id' => $file->id]);
            }
        }

        // Vytvor nových sponzorov
        if ($request->filled('sponsors')) {
            foreach ($request->sponsors as $i => $name) {
                if (!$name) continue;

                $fileId = null;

                if ($request->hasFile('sponsor_images') && isset($request->file('sponsor_images')[$i])) {
                    $logo   = $request->file('sponsor_images')[$i];
                    $path   = $logo->store('sponsors', 'public');
                    $file   = File::create(['type' => 'image', 'url' => $path]);
                    $fileId = $file->id;
                }

                $sponsor         = Sponsor::create(['name' => $name, 'file_id' => $fileId]);
                $newSponsorIds[] = $sponsor->id;
            }
        }

        $event->sponsors()->sync(array_merge($existingIds, $newSponsorIds));

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
        $event->update(['archived' => false]);

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
