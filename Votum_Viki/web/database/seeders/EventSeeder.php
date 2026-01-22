<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\EventDate;

class EventSeeder extends Seeder
{
    public function run(): void
    {

        $events = [
            [
                'title_sk' => 'Tvorba Adventných vencov',
                'title_en' => 'Advent Wreath Workshop',
                'content_sk' => 'Pripojte sa k nám na tvorivú dielňu, kde si spoločne vytvoríme adventné vence.',
                'content_en' => 'Join us for a creative workshop where we will make advent wreaths together.',
                'inCalendar' => true,
                'inHome' => true,
                'inGallery' => false,
                'archived' => false,
                'color' => 'c1',
                'dates' => ['2025-11-27', '2025-11-28', '2025-11-29'],
            ],
            [
                'title_sk' => 'Koncert Kapely VOTUM na Bratislavských Vianociach',
                'title_en' => 'VOTUM Band Concert at Bratislava Christmas',
                'content_sk' => 'Príďte si vychutnať vianočný koncert našej kapely na Františkánskom námestí.',
                'content_en' => 'Come and enjoy our Christmas concert at Franciscan Square.',
                'inCalendar' => true,
                'inHome' => true,
                'inGallery' => false,
                'archived' => false,
                'color' => 'c2',
                'dates' => ['2025-12-07'],
            ],
            [
                'title_sk' => 'Adventný koncert a večierok v Marianke',
                'title_en' => 'Advent Concert and Party in Marianka',
                'content_sk' => 'Adventný koncert spojený s večierkom v Marianke.',
                'content_en' => 'Advent concert combined with a party in Marianka.',
                'inCalendar' => true,
                'inHome' => false,
                'inGallery' => false,
                'archived' => false,
                'color' => 'c3',
                'dates' => ['2025-12-14'],
            ],
            [
                'title_sk' => 'Ponuka vianočných oplátok',
                'title_en' => 'Christmas Wafers Offer',
                'content_sk' => 'Vianočné oplátky spojené s podporou združenia Votum dostupné vo farnostiach Teplická a Marianka.',
                'content_en' => 'Christmas wafers supporting VOTUM association available in Teplická and Marianka parishes.',
                'inCalendar' => true,
                'inHome' => false,
                'inGallery' => false,
                'archived' => false,
                'color' => 'c4',
                'dates' => [
                    '2025-12-01', '2025-12-02', '2025-12-03', '2025-12-04', '2025-12-05',
                    '2025-12-06', '2025-12-07', '2025-12-08', '2025-12-09', '2025-12-10',
                    '2025-12-11', '2025-12-12', '2025-12-13', '2025-12-14', '2025-12-15',
                    '2025-12-16', '2025-12-17', '2025-12-18', '2025-12-19', '2025-12-20',
                    '2025-12-21', '2025-12-22',
                ],
            ],
            [
                'title_sk' => 'Farský ples vo farnosti Teplická',
                'title_en' => 'Parish Ball at Teplická Parish',
                'content_sk' => 'Farský ples s vystúpením našich Votumákov.',
                'content_en' => 'Parish ball with performance by our VOTUM members.',
                'inCalendar' => false,
                'inHome' => false,
                'inGallery' => false,
                'archived' => true,
                'color' => 'c5',
                'dates' => ['2026-02-07'],
            ],
            [
                'title_sk' => 'Letný koncert vo V-klube',
                'title_en' => 'Summer Concert at V-club',
                'content_sk' => 'Letný koncert pre rodičov, priateľov a podporovateľov.',
                'content_en' => 'Summer concert for parents, friends and supporters.',
                'inCalendar' => true,
                'inHome' => false,
                'inGallery' => false,
                'archived' => false,
                'color' => 'c6',
                'dates' => ['2026-05-31'],
            ],
            [
                'title_sk' => 'Letný kemp v Marianke',
                'title_en' => 'Summer Camp in Marianka',
                'content_sk' => 'Týždeň plný športu, hudby, tanca, tvorivých dielní a smiechu.',
                'content_en' => 'A week full of sports, music, dance, creative workshops and laughter.',
                'inCalendar' => true,
                'inHome' => true,
                'inGallery' => false,
                'archived' => false,
                'color' => 'c7',
                'dates' => ['2026-07-06','2026-07-07','2026-07-08','2026-07-09','2026-07-10'],
            ],
            [
                'title_sk' => 'Leto 2022 v Tučepy',
                'title_en' => 'Leto 2022 v Tučepy',
                'content_sk' => 'Spoločná letná dovolenka v Chorvátskom Tučepi',
                'content_en' => '',
                'inCalendar' => false,
                'inHome' => true,
                'inGallery' => true,
                'archived' => false,
                'color' => 'c6',
                'dates' => ['2026-05-31'],
            ],
        ];

        foreach ($events as $data) {
            $event = Event::create([
                'title_sk' => $data['title_sk'],
                'title_en' => $data['title_en'],
                'content_sk' => $data['content_sk'],
                'content_en' => $data['content_en'],
                'inCalendar' => $data['inCalendar'],
                'inHome' => $data['inHome'],
                'inGallery' => $data['inGallery'],
                'archived' => $data['archived'],
                'color' => $data['color'],
            ]);

            foreach ($data['dates'] as $date) {
                EventDate::create([
                    'event_id' => $event->id,
                    'date' => $date,
                ]);
            }
        }
    }
}
