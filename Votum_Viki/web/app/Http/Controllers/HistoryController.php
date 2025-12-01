<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Routing\Controller;

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
                return [
                    'year' => $item->year,
                    'name' => $locale === 'sk' ? $item->title_sk : $item->title_en,
                    'text' => $locale === 'sk' ? $item->content_sk : $item->content_en,
                ];
            });

        return view('pages.history', [
            'timeline' => $sections
        ]);
    }
}
