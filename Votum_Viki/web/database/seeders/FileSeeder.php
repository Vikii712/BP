<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    public function run()
    {
        // Hero sekcia
        $heroSectionId = DB::table('sections')->where('category', 'hero')->value('id');

        if ($heroSectionId) {
            DB::table('files')->insert([
                [
                    'section_id' => $heroSectionId,
                    'url' => 'images/group.jpg',
                    'title_sk' => 'Úvodná fotka členov združenia votum',
                    'title_en' => 'Hero image with members of votum',
                    'type' => 'image',
                    'event_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        // Team sekcia
        $teamSectionId = DB::table('sections')->where('category', 'ourTeam')->value('id');

        if ($teamSectionId) {
            DB::table('files')->insert([
                [
                    'section_id' => $teamSectionId,
                    'url' => 'images/team.jpg',
                    'title_sk' => 'Fotka nášho tímu',
                    'title_en' => 'Team photo',
                    'type' => 'image',
                    'event_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
