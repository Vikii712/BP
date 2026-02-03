<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeEditController extends Controller
{
    public function edit()
    {
        $heroSection = Section::where('category', 'hero')->first();
        $teamSection = Section::where('category', 'ourTeam')->first();

        $heroFile = $heroSection
            ? DB::table('files')->where('section_id', $heroSection->id)->where('type', 'image')->first()
            : null;

        $teamFile = $teamSection
            ? DB::table('files')->where('section_id', $teamSection->id)->where('type', 'image')->first()
            : null;

        return view('pages.admin.home-edit', [
            'data' => [
                'sk' => [
                    'motto'      => $heroSection?->title_sk ?? '',
                    'intro'      => $heroSection?->content_sk ?? '',
                    'hero_image' => $heroFile?->url ?? '',
                    'hero_alt'   => $heroFile?->title_sk ?? '',
                    'team_image' => $teamFile?->url ?? '',
                    'team_alt'   => $teamFile?->title_sk ?? '',
                ],
                'en' => [
                    'motto'      => $heroSection?->title_en ?? '',
                    'intro'      => $heroSection?->content_en ?? '',
                    'hero_image' => $heroFile?->url ?? '',
                    'hero_alt'   => $heroFile?->title_en ?? '',
                    'team_image' => $teamFile?->url ?? '',
                    'team_alt'   => $teamFile?->title_en ?? '',
                ],
            ],
        ]);
    }

    public function update(Request $request)
    {
        // ========= HERO =========
        $heroSection = Section::where('category', 'hero')->first();

        if ($heroSection) {
            $heroSection->update([
                'title_sk'   => $request->input('sk.motto') ?? '',
                'content_sk' => $request->input('sk.intro') ?? '',
                'title_en'   => $request->input('en.motto') ?? '',
                'content_en' => $request->input('en.intro') ?? '',
            ]);

            $heroFile = DB::table('files')
                ->where('section_id', $heroSection->id)
                ->where('type', 'image')
                ->first();

            $heroUrl = $heroFile?->url;

            if ($request->hasFile('hero_image')) {
                $file = $request->file('hero_image');

                $filename = 'hero_' . time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('images', $filename, 'public');

                $heroUrl = $path;
            }

            DB::table('files')->updateOrInsert(
                [
                    'section_id' => $heroSection->id,
                    'type'       => 'image',
                ],
                [
                    'url'       => $heroUrl,
                    'title_sk'  => $request->input('sk.hero_alt'),
                    'title_en'  => $request->input('en.hero_alt'),
                    'updated_at'=> now(),
                    'created_at'=> now(),
                ]
            );
        }

        // ========= TEAM =========
        $teamSection = Section::where('category', 'ourTeam')->first();

        if ($teamSection) {
            $teamFile = DB::table('files')
                ->where('section_id', $teamSection->id)
                ->where('type', 'image')
                ->first();

            $teamUrl = $teamFile?->url;

            if ($request->hasFile('team_image')) {
                $file = $request->file('team_image');

                $filename = 'team_' . time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('images', $filename, 'public');

                $teamUrl = $path;
            }

            DB::table('files')->updateOrInsert(
                [
                    'section_id' => $teamSection->id,
                    'type'       => 'image',
                ],
                [
                    'url'       => $teamUrl,
                    'title_sk'  => $request->input('sk.team_alt'),
                    'title_en'  => $request->input('en.team_alt'),
                    'updated_at'=> now(),
                    'created_at'=> now(),
                ]
            );
        }

        return redirect()->back()->with('success', 'Údaje boli uložené.');
    }
}
