<?php

namespace App\Http\Controllers;

use App\Helpers\HtmlSanitizer;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AboutEditController extends Controller
{
    public function index()
    {
        $sections = Section::where('category', 'about')
            ->orderBy('position')
            ->get()
            ->map(function ($item) {

                $image = DB::table('files')
                    ->where('section_id', $item->id)
                    ->where('type', 'image')
                    ->first();

                return (object)[
                    'id' => $item->id,
                    'position' => $item->position,

                    'title_sk' => $item->title_sk,
                    'title_en' => $item->title_en,
                    'content_sk' => $item->content_sk,
                    'content_en' => $item->content_en,

                    'image' => $image ? (object)[
                        'url' => $image->url,
                        'alt_sk' => $image->title_sk,
                        'alt_en' => $image->title_en,
                        'id' => $image->id,
                    ] : null,
                ];
            });

        return view('pages.admin.about_sections', [
            'about' => $sections
        ]);
    }


    /* =========================
     * ADD
     * ========================= */
    public function add(Request $request)
    {
        $request->validate([
            'sk.title' => ['required', 'string'],
            'en.title' => ['required', 'string'],
            'sk.content' => ['required', 'string'],
            'en.content' => ['required', 'string'],

            'image' => ['nullable', 'image'],
            'image_alt_sk' => ['required_with:image', 'nullable', 'string'],
            'image_alt_en' => ['required_with:image', 'nullable', 'string'],
        ]);



        $newPosition = (Section::where('category', 'about')->max('position') ?? 0) + 1;

        $section = Section::create([
            'title_sk' => $request->input('sk.title'),
            'title_en' => $request->input('en.title'),
            'content_sk' => HtmlSanitizer::clean($request->input('sk.content')),
            'content_en' => HtmlSanitizer::clean($request->input('en.content')),
            'position' => $newPosition,
            'category' => 'about',
        ]);

        // image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('about', 'public');

            DB::table('files')->insert([
                'section_id' => $section->id,
                'url' => $path,
                'type' => 'image',
                'title_sk' => $request->image_alt_sk,
                'title_en' => $request->image_alt_en,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Sekcia bola pridaná.');
    }

    /* =========================
     * UPDATE
     * ========================= */
    public function update(Request $request, $id)
    {
        $item = Section::where('category', 'about')->findOrFail($id);

        if ($request->remove_image) {
            DB::table('files')
                ->where('section_id', $item->id)
                ->where('type', 'image')
                ->delete();
        }

        $request->validate([
            'title_sk' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'content_sk' => ['required', 'string'],
            'content_en' => ['required', 'string'],

            'image' => ['nullable', 'image'],
            'image_alt_sk' => ['required_with:image', 'nullable', 'string'],
            'image_alt_en' => ['required_with:image', 'nullable', 'string'],
        ]);

        // texty
        $item->update([
            'title_sk' => $request->title_sk,
            'title_en' => $request->title_en,
            'content_sk' => HtmlSanitizer::clean($request->content_sk),
            'content_en' => HtmlSanitizer::clean($request->content_en),
        ]);

        $existingImage = DB::table('files')
            ->where('section_id', $item->id)
            ->where('type', 'image')
            ->first();

        // nový obrázok
        if ($request->hasFile('image')) {

            if ($existingImage) {
                Storage::disk('public')->delete($existingImage->url);

                DB::table('files')
                    ->where('id', $existingImage->id)
                    ->delete();
            }

            $path = $request->file('image')->store('about', 'public');

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

        return redirect()->back()->with('success', 'Sekcia bola upravená.');
    }

    /* =========================
     * DELETE
     * ========================= */
    public function delete($id)
    {
        $item = Section::where('category', 'about')->findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Sekcia bola vymazaná.');
    }

    /* =========================
     * ORDERING
     * ========================= */
    public function moveUp($id)
    {
        $item = Section::where('category', 'about')->findOrFail($id);

        if ($item->position > 1) {
            $swap = Section::where('category', 'about')
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
        $item = Section::where('category', 'about')->findOrFail($id);
        $max = Section::where('category', 'about')->max('position');

        if ($item->position < $max) {
            $swap = Section::where('category', 'about')
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
