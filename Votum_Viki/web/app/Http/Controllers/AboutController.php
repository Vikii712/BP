<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Routing\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $locale = session('locale', 'sk');

        $sections = Section::where('category', 'about')
            ->orderBy('position')
            ->get()
            ->map(function ($item) use ($locale) {
                return [
                    'title' => $locale === 'sk' ? $item->title_sk : $item->title_en,
                    'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
                ];
            });

        $team = Section::where('category', 'team')
            ->orderBy('position')
            ->get()
            ->map(function ($item) use ($locale) {
                return [
                    'title' => $locale === 'sk' ? $item->title_sk : $item->title_en,
                    'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
                    'image' => $item->files->first()?->url,
                    ];
            });

        return view('pages.aboutus', [
            'sections' => $sections,
            'team' => $team,
        ]);
    }
}
