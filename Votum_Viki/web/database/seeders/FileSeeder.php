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






        // -------------------
        // Dokumentyyyyyyyyy
        // -------------------

        $sectionId = DB::table('sections')->insertGetId([
            'title_sk'   => 'Prihlášky',
            'title_en'   => 'Applications',
            'content_sk' => '',
            'content_en' => '',
            'year'       => null,
            'position'   => 1,
            'category'   => 'documentSection',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $documents = [
            [
                'file' => 'docs/04_Lecture.pdf',
                'sk'   => 'Prihláška – dokument 04',
                'en'   => 'Application – document 04',
            ],
            [
                'file' => 'docs/05_Lecture.pdf',
                'sk'   => 'Prihláška – dokument 05',
                'en'   => 'Application – document 05',
            ],
            [
                'file' => 'docs/06_Lecture.pdf',
                'sk'   => 'Prihláška – dokument 06',
                'en'   => 'Application – document 06',
            ],
            [
                'file' => 'docs/07_Lecture.pdf',
                'sk'   => 'Prihláška – dokument 07',
                'en'   => 'Application – document 07',
            ],
            [
                'file' => 'docs/08_Lecture.pdf',
                'sk'   => 'Prihláška – dokument 08',
                'en'   => 'Application – document 08',
            ],
        ];

        foreach ($documents as $doc) {
            DB::table('files')->insert([
                'section_id' => $sectionId,
                'url'        => $doc['file'],
                'title_sk'   => $doc['sk'],
                'title_en'   => $doc['en'],
                'type'       => 'document',
                'event_id'   => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $sectionId = DB::table('sections')->insertGetId([
            'title_sk'   => 'Dve Percentá',
            'title_en'   => 'Two Percents',
            'content_sk' => '',
            'content_en' => '',
            'year'       => null,
            'position'   => 2,
            'category'   => 'documentSection',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach ($documents as $doc) {
            DB::table('files')->insert([
                'section_id' => $sectionId,
                'url'        => $doc['file'],
                'title_sk'   => $doc['sk'],
                'title_en'   => $doc['en'],
                'type'       => 'document',
                'event_id'   => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $sectionId = DB::table('sections')->insertGetId([
            'title_sk'   => 'GDPR',
            'title_en'  => 'GDPR',
            'content_sk' => '',
            'content_en' => '',
            'year'       => null,
            'position'   => 3,
            'category'   => 'documentSection',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach ($documents as $doc) {
            DB::table('files')->insert([
                'section_id' => $sectionId,
                'url'        => $doc['file'],
                'title_sk'   => $doc['sk'],
                'title_en'   => $doc['en'],
                'type'       => 'document',
                'event_id'   => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $qrSectionId = DB::table('sections')
            ->where('category', 'qrHow')
            ->value('id');

        if ($qrSectionId) {
            DB::table('files')->insert([
                'section_id' => $qrSectionId,
                'url' => 'images/support/qr.jpg',
                'title_sk' => 'QR kód podpory VOTUM',
                'title_en' => 'QR code to support VOTUM',
                'type' => 'image',
                'event_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


    }
}
