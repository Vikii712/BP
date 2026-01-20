<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    public function run()
    {
        // -------------------
        // Hero sekcia
        // -------------------
        $heroSectionId = DB::table('sections')
            ->where('category', 'hero')
            ->value('id');

        if ($heroSectionId) {
            DB::table('files')->insert([
                'section_id' => $heroSectionId,
                'url' => 'images/group.jpg',
                'title_sk' => 'Úvodná fotka členov združenia VOTUM',
                'title_en' => 'Hero image with members of VOTUM',
                'type' => 'image',
                'event_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // -------------------
        // Our Team sekcia
        // -------------------
        $teamSectionId = DB::table('sections')
            ->where('category', 'ourTeam')
            ->value('id');

        if ($teamSectionId) {
            DB::table('files')->insert([
                'section_id' => $teamSectionId,
                'url' => 'images/team.jpg',
                'title_sk' => 'Fotka nášho tímu',
                'title_en' => 'Team photo',
                'type' => 'image',
                'event_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // -------------------
        // About sekcie
        // -------------------
        $aboutImages = [
            1 => [
                'file' => 'images/about/us_votum.svg',
                'sk' => 'Združenie VOTUM',
                'en' => 'VOTUM association',
            ],
            2 => [
                'file' => 'images/about/mission.png',
                'sk' => 'Naše poslanie',
                'en' => 'Our mission',
            ],
            3 => [
                'file' => 'images/about/regular.png',
                'sk' => 'Pravidelná činnosť',
                'en' => 'Regular activities',
            ],
            4 => [
                'file' => 'images/about/community.png',
                'sk' => 'Komunitné aktivity',
                'en' => 'Community activities',
            ],
            5 => [
                'file' => 'images/about/music.png',
                'sk' => 'Muzikoterapia',
                'en' => 'Music therapy',
            ],
        ];

        foreach ($aboutImages as $position => $image) {

            $sectionId = DB::table('sections')
                ->where('category', 'about')
                ->where('position', $position)
                ->value('id');

            if ($sectionId) {
                DB::table('files')->insert([
                    'section_id' => $sectionId,
                    'url' => $image['file'],
                    'title_sk' => $image['sk'],
                    'title_en' => $image['en'],
                    'type' => 'image',
                    'event_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
