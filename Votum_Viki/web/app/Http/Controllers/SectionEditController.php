<?php

namespace App\Http\Controllers;

use App\Helpers\HtmlSanitizer;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SectionEditController extends Controller
{
    protected $category;
    protected $hasYear = false; // pre history

    public function __construct(Request $request)
    {
        $this->category = $request->route('category');

        // history má year
        if ($this->category === 'history') {
            $this->hasYear = true;
        }
    }

    public function index()
    {
        $items = Section::where('category', $this->category)
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
                    'year' => $item->year ?? null,
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

        // dynamický nadpis podľa kategórie
        $titles = [
            'history' => 'História',
            'about'   => 'O nás',
            'team'    => 'Tím',
        ];

        $title = $titles[$this->category] ?? 'Sekcie';

        return view('pages.admin.sections-edit', [
            'category' => $this->category,
            'items'    => $items,
            'title'    => $title,
        ]);
    }

    // =========================
    // ADD
    // =========================
    public function add(Request $request)
    {
        $rules = [
            'sk.title' => ['required', 'string'],
            'en.title' => ['required', 'string'],
            'sk.content' => ['required', 'string'],
            'en.content' => ['required', 'string'],
            'image' => ['nullable', 'image'],
            'image_alt_sk' => ['required_with:image', 'nullable', 'string'],
            'image_alt_en' => ['required_with:image', 'nullable', 'string'],
        ];

        if ($this->hasYear) {
            $rules['year'] = ['required', 'integer'];
        }

        $request->validate($rules);

        // pozícia
        if ($this->hasYear) {
            // u history vložíme podľa year
            $insertBefore = Section::where('category', 'history')
                ->where('year', '>', $request->year)
                ->orderBy('position')
                ->first();

            $newPosition = $insertBefore ? $insertBefore->position :
                ((Section::where('category', 'history')->max('position') ?? 0) + 1);

            // posuň existujúce
            Section::where('category', 'history')
                ->where('position', '>=', $newPosition)
                ->increment('position');
        } else {
            $newPosition = (Section::where('category', $this->category)->max('position') ?? 0) + 1;
        }

        // vložíme sekciu
        $section = Section::create([
            'title_sk' => $request->input('sk.title'),
            'title_en' => $request->input('en.title'),
            'content_sk' => HtmlSanitizer::clean($request->input('sk.content')),
            'content_en' => HtmlSanitizer::clean($request->input('en.content')),
            'position' => $newPosition,
            'category' => $this->category,
            'year' => $this->hasYear ? $request->year : null,
        ]);

        // upload obrázka
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store($this->category, 'public');

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

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $item = Section::where('category', $this->category)->findOrFail($id);

        if ($request->remove_image) {
            DB::table('files')
                ->where('section_id', $item->id)
                ->where('type', 'image')
                ->delete();
        }

        $rules = [
            'title_sk' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'content_sk' => ['required', 'string'],
            'content_en' => ['required', 'string'],
            'image' => ['nullable', 'image'],
            'image_alt_sk' => ['required_with:image', 'nullable', 'string'],
            'image_alt_en' => ['required_with:image', 'nullable', 'string'],
        ];

        if ($this->hasYear) {
            $rules['year'] = ['required', 'integer'];
        }

        $request->validate($rules);

        $item->update([
            'title_sk' => $request->title_sk,
            'title_en' => $request->title_en,
            'content_sk' => HtmlSanitizer::clean($request->content_sk),
            'content_en' => HtmlSanitizer::clean($request->content_en),
            'year' => $this->hasYear ? $request->year : $item->year,
        ]);

        // spracovanie obrázka
        $existingImage = DB::table('files')
            ->where('section_id', $item->id)
            ->where('type', 'image')
            ->first();

        if ($request->hasFile('image')) {
            if ($existingImage) {
                Storage::disk('public')->delete($existingImage->url);
                DB::table('files')->where('id', $existingImage->id)->delete();
            }

            $path = $request->file('image')->store($this->category, 'public');

            DB::table('files')->insert([
                'section_id' => $item->id,
                'url' => $path,
                'type' => 'image',
                'title_sk' => $request->image_alt_sk,
                'title_en' => $request->image_alt_en,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } elseif ($existingImage) {
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

    // =========================
    // DELETE
    // =========================
    public function delete($id)
    {
        $item = Section::where('category', $this->category)->findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Sekcia bola vymazaná.');
    }

    // =========================
    // MOVE UP / DOWN
    // =========================
    public function moveUp($id)
    {
        $item = Section::where('category', $this->category)->findOrFail($id);

        if ($item->position > 1) {
            $swap = Section::where('category', $this->category)
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
        $item = Section::where('category', $this->category)->findOrFail($id);
        $max = Section::where('category', $this->category)->max('position');

        if ($item->position < $max) {
            $swap = Section::where('category', $this->category)
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
