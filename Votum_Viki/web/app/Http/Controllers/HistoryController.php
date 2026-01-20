<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index()
    {
        $locale = session('locale', 'sk');

        $sections = Section::where('category', 'history')
            ->orderBy('year')
            ->orderBy('position')
            ->get()
            ->map(function ($item) use ($locale) {

                $image = DB::table('files')
                    ->where('section_id', $item->id)
                    ->where('type', 'image')
                    ->first();

                return [
                    'year' => $item->year,
                    'name' => $locale === 'sk' ? $item->title_sk : $item->title_en,
                    'text' => $locale === 'sk' ? $item->content_sk : $item->content_en,

                    'image' => $image ? [
                        'url' => asset('storage/' . $image->url),
                        'alt' => $locale === 'sk'
                            ? $image->title_sk
                            : $image->title_en,
                    ] : null,
                ];
            });

        return view('pages.history', [
            'timeline' => $sections
        ]);
    }
}
