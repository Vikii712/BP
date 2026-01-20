<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HistoryEditController extends Controller
{
    public function edit()
    {
        $sections = Section::where('category', 'history')
            ->orderBy('position')
            ->get();

        $history = $sections->map(function ($item) {

            $image = DB::table('files')
                ->where('section_id', $item->id)
                ->where('type', 'image')
                ->first();

            return (object) [
                'id' => $item->id,
                'year' => $item->year,
                'position' => $item->position,

                'title_sk' => $item->title_sk,
                'title_en' => $item->title_en,
                'content_sk' => $item->content_sk,
                'content_en' => $item->content_en,

                'image' => $image ? (object) [
                    'url' => $image->url,
                    'alt_sk' => $image->title_sk,
                    'alt_en' => $image->title_en,
                    'id' => $image->id,
                ] : null,
            ];
        });

        return view('pages.admin.history-edit', compact('history'));
    }



    public function add(Request $request)
    {
        $request->validate([
            'year' => ['required', 'integer'],
            'sk.title' => ['required', 'string'],
            'en.title' => ['required', 'string'],
            'sk.content' => ['required', 'string'],
            'en.content' => ['required', 'string'],

            'image' => ['nullable', 'image'],
            'image_alt_sk' => [
                'required_with:image',
                'nullable',
                'string',
            ],
            'image_alt_en' => [
                'required_with:image',
                'nullable',
                'string',
            ],
        ]);

        $insertBefore = Section::where('category', 'history')
            ->where('year', '>', $request->year)
            ->orderBy('position')
            ->first();

        if ($insertBefore) {
            $newPosition = $insertBefore->position;
        } else {
            $newPosition = (Section::where('category', 'history')->max('position') ?? 0) + 1;
        }

        Section::where('category', 'history')
            ->where('position', '>=', $newPosition)
            ->increment('position');

        Section::create([
            'title_sk'   => $request->input('sk.title'),
            'title_en'   => $request->input('en.title'),
            'content_sk' => $request->input('sk.content'),
            'content_en' => $request->input('en.content'),
            'year'       => $request->year,
            'position'   => $newPosition,
            'category'   => 'history',
        ]);

        return redirect()->back()->with('success', 'Udalosť bola pridaná.');
    }



    public function editItem($id)
    {
        $item = Section::where('category', 'history')->findOrFail($id);
        return view('pages.admin.history-edit-item', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Section::where('category', 'history')->findOrFail($id);

        if ($request->remove_image) {
            DB::table('files')
                ->where('section_id', $item->id)
                ->where('type', 'image')
                ->delete();
        }

        $request->validate([
            'year' => ['required', 'integer'],
            'title_sk' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'content_sk' => ['required', 'string'],
            'content_en' => ['required', 'string'],

            'image' => ['nullable', 'image'],
            'image_alt_sk' => [
                'required_with:image',
                'nullable',
                'string',
            ],
            'image_alt_en' => [
                'required_with:image',
                'nullable',
                'string',
            ],
        ]);

        // texty
        $item->update([
            'title_sk' => $request->title_sk,
            'title_en' => $request->title_en,
            'content_sk' => $request->content_sk,
            'content_en' => $request->content_en,
            'year' => $request->year,
        ]);

        // existujúci image
        $existingImage = DB::table('files')
            ->where('section_id', $item->id)
            ->where('type', 'image')
            ->first();

        // nový upload
        if ($request->hasFile('image')) {

            if ($existingImage) {
                Storage::disk('public')->delete($existingImage->url);

                DB::table('files')
                    ->where('id', $existingImage->id)
                    ->delete();
            }

            $path = $request->file('image')->store('history', 'public');

            DB::table('files')->insert([
                'section_id' => $item->id,
                'url' => $path,
                'type' => 'image',
                'title_sk' => $request->image_alt_sk,
                'title_en' => $request->image_alt_en,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // len ALT texty
        elseif ($existingImage) {
            DB::table('files')
                ->where('id', $existingImage->id)
                ->update([
                    'title_sk' => $request->image_alt_sk,
                    'title_en' => $request->image_alt_en,
                    'updated_at' => now(),
                ]);
        }

        return redirect()->back()->with('success', 'Udalosť bola upravená.');
    }

    public function delete($id)
    {
        $item = Section::where('category', 'history')->findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Udalosť bola vymazaná.');
    }

    public function moveUp($id)
    {
        $item = Section::where('category', 'history')->findOrFail($id);
        if ($item->position > 1) {
            $swap = Section::where('category', 'history')
                ->where('position', $item->position - 1)
                ->first();
            if ($swap) {
                $swap->update(['position' => $item->position]);
            }
            $item->update(['position' => $item->position - 1]);
        }
        return redirect()->back();
    }

    public function moveDown($id)
    {
        $item = Section::where('category', 'history')->findOrFail($id);
        $maxPosition = Section::where('category', 'history')->max('position');
        if ($item->position < $maxPosition) {
            $swap = Section::where('category', 'history')
                ->where('position', $item->position + 1)
                ->first();
            if ($swap) {
                $swap->update(['position' => $item->position]);
            }
            $item->update(['position' => $item->position + 1]);
        }
        return redirect()->back();
    }
}
