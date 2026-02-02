<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();

        $sections = DB::table('sections')
            ->where('category', 'documentSection')
            ->orderBy('position')
            ->get()
            ->map(function ($section) use ($locale) {

                $section->documents = File::where('section_id', $section->id)
                    ->where('type', 'document')
                    ->get()
                    ->map(function ($doc) use ($locale) {

                        $doc->title = $locale === 'sk'
                            ? $doc->title_sk
                            : $doc->title_en;

                        $doc->size_kb = $doc->url && Storage::disk('public')->exists($doc->url)
                            ? round(Storage::disk('public')->size($doc->url) / 1024)
                            : null;

                        $doc->download_url = asset('storage/' . $doc->url);

                        return $doc;
                    });

                return $section;
            });

        return view('pages.documents', compact('sections'));
    }
}
