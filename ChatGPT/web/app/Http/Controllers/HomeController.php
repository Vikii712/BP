<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->query('lang', 'sk');
        $t = $this->translations($lang);

        // Sample events (dates are Y-m-d)
        $events = [
            ['title' => $t['event_concert'], 'date' => '2025-08-09', 'type'=>'concert'],
            ['title' => $t['event_performance'], 'date' => '2025-08-20', 'type'=>'performance'],
            ['title' => $t['event_camp'], 'date' => '2025-08-29', 'type'=>'camp'],
        ];

        // Today's calendar month (August 2025 as in your wireframe)
        $calendarMonth = Carbon::create(2025, 8, 1);

        return view('home', compact('events','calendarMonth','t','lang'));
    }

    protected function translations($lang)
    {
        $strings = [
            'sk' => [
                'site_name' => 'VOTUM',
                'home' => 'Domov',
                'about' => 'O nás',
                'events' => 'Udalosti',
                'history' => 'História',
                'support' => 'Podpora',
                'contacts' => 'Kontakty',
                'documents' => 'Dokumenty',
                'slogan' => 'Spolu je život veselší',
                'more_about_us' => 'Viac o nás',
                'add_to_calendar' => 'Uložiť do môjho kalendára',
                'featured' => 'Naše Aktivity',
                'see_more' => 'Viac',
                'team' => 'Náš tím',
                'learn_team' => 'Spoznaj členov nášho tímu',
                'event_concert' => 'Koncert',
                'event_performance' => 'Vystúpenie',
                'event_camp' => 'Tábor',
                'font_inc' => 'Zväčši písmo',
                'font_dec' => 'Zmenši písmo',
                'lang_label' => 'SK / EN',
                'share' => 'Zdieľať',
            ],
            'en' => [
                'site_name' => 'VOTUM',
                'home' => 'Home',
                'about' => 'About us',
                'events' => 'Events',
                'history' => 'History',
                'support' => 'Support',
                'contacts' => 'Contacts',
                'documents' => 'Documents',
                'slogan' => 'Life is better together',
                'more_about_us' => 'More about us',
                'add_to_calendar' => 'Add to your calendar',
                'featured' => 'Our Activities',
                'see_more' => 'See more',
                'team' => 'Our team',
                'learn_team' => 'Meet our team members',
                'event_concert' => 'Concert',
                'event_performance' => 'Performance',
                'event_camp' => 'Camp',
                'font_inc' => 'Increase font',
                'font_dec' => 'Decrease font',
                'lang_label' => 'SK / EN',
                'share' => 'Share',
            ]
        ];

        return $strings[$lang] ?? $strings['sk'];
    }
}
