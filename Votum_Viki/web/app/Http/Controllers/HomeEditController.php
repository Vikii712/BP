<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeEditController extends Controller
{
    public function edit()
    {
        $locale = session('locale', 'sk');

        // --- HERO ---
        $heroSection = Section::where('category', 'hero')->first();
        $heroImage = null;
        $heroAltSk = null;
        $heroAltEn = null;

        if ($heroSection) {
            $heroImage = DB::table('files')
                ->where('section_id', $heroSection->id)
                ->where('type', 'image')
                ->value('url');

            $heroAltSk = DB::table('files')
                ->where('section_id', $heroSection->id)
                ->where('type', 'image')
                ->value('title_sk');

            $heroAltEn = DB::table('files')
                ->where('section_id', $heroSection->id)
                ->where('type', 'image')
                ->value('title_en');
        }

        // --- TEAM ---
        $teamSection = Section::where('category', 'ourTeam')->first();
        $teamImage = null;
        $teamAltSk = null;
        $teamAltEn = null;

        if ($teamSection) {
            $teamImage = DB::table('files')
                ->where('section_id', $teamSection->id)
                ->where('type', 'image')
                ->value('url');

            $teamAltSk = DB::table('files')
                ->where('section_id', $teamSection->id)
                ->where('type', 'image')
                ->value('title_sk');

            $teamAltEn = DB::table('files')
                ->where('section_id', $teamSection->id)
                ->where('type', 'image')
                ->value('title_en');
        }

        return view('pages.admin.home-edit', [
            'data' => [
                'sk' => [
                    'motto' => $heroSection?->title_sk ?? '',
                    'intro' => $heroSection?->content_sk ?? '',
                    'hero_image' => $heroImage ?? '',
                    'hero_alt' => $heroAltSk ?? '',
                    'team_image' => $teamImage ?? '',
                    'team_alt' => $teamAltSk ?? '',
                ],
                'en' => [
                    'motto' => $heroSection?->title_en ?? '',
                    'intro' => $heroSection?->content_en ?? '',
                    'hero_image' => $heroImage ?? '',
                    'hero_alt' => $heroAltEn ?? '',
                    'team_image' => $teamImage ?? '',
                    'team_alt' => $teamAltEn ?? '',
                ],
            ],
        ]);
    }

    public function update(Request $request)
    {
        $locale = session('locale', 'sk');

        // --- HERO ---
        $heroSection = Section::where('category', 'hero')->first();
        if ($heroSection) {
            $heroSection->update([
                'title_sk' => $request->input('sk.motto'),
                'content_sk' => $request->input('sk.intro'),
                'title_en' => $request->input('en.motto'),
                'content_en' => $request->input('en.intro'),
            ]);

            DB::table('files')
                ->where('section_id', $heroSection->id)
                ->where('type', 'image')
                ->update([
                    'url' =>  $request->hero_image,
                    'title_sk' => $request->input('sk.hero_alt'),
                    'title_en' => $request->input('en.hero_alt'),
                ]);
        }

        // --- TEAM ---
        $teamSection = Section::where('category', 'ourTeam')->first();
        if ($teamSection) {
            DB::table('files')
                ->where('section_id', $teamSection->id)
                ->where('type', 'image')
                ->update([
                    'url' =>  $request->team_image,
                    'title_sk' => $request->input('sk.team_alt'),
                    'title_en' => $request->input('en.team_alt'),
                ]);
        }

        return redirect()->back()->with('success', 'Údaje boli uložené.');
    }
}
