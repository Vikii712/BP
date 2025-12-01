<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Section;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $locale = session('locale', 'sk');
        $isSK = $locale === 'sk';

        $heroData = Section::where('category', 'hero')->first();

        $hero = null;
        if ($heroData) {
            $hero = (object) [
                'title' => $isSK ? $heroData->title_sk : $heroData->title_en,
                'content' => $isSK ? $heroData->content_sk : $heroData->content_en,
            ];
        }

        $events = Event::with('dates')
            ->where('inCalendar', true)
            ->get()
            ->map(function ($event) use ($locale) {
                return [
                    'id' => $event->id,
                    'title' => $locale === 'sk' ? $event->title_sk : $event->title_en,
                    'description' => $locale === 'sk' ? $event->content_sk : $event->content_en,
                    'color' => $event->color,
                    'dates' => $event->dates->pluck('date')->map(function($date) {
                        return date('Y-m-d', strtotime($date)); // ✅ Formátuj ako Y-m-d
                    })->toArray(),
                ];
            });


        return view('pages.main', [
            'hero' => $hero,
            'events' => $events,
        ]);
    }
}
