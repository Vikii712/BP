<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class SupportEditController extends Controller
{
    public function edit($type)
    {
        $sections = [];
        $qrImage = null;

        switch($type) {
            case 'percent':
                $sections['percentWhy']    = Section::where('category', 'percentWhy')->orderBy('position')->get();
                $sections['percentInfo']   = Section::where('category', 'percentInfo')->orderBy('position')->get();
                $sections['percentHow']    = Section::where('category', 'percentHow')->orderBy('position')->get();
                $sections['percentThanks'] = Section::where('category', 'percentThanks')->orderBy('position')->get();
                $type = 'Dve percentá';
                break;

            case 'financial':
                $sections['financialWhy']    = Section::where('category', 'financialWhy')->orderBy('position')->get();
                $sections['qrHow']  = Section::where('category', 'qrHow')->get();

                $qrSectionId = Section::where('category', 'qrHow')->value('id');
                $qrImage = $qrSectionId
                    ? DB::table('files')->where('section_id', $qrSectionId)->where('type', 'image')->first()
                    : null;

                $sections['bank']   = Section::where('category', 'bank')->get();
                $sections['financialThanks'] = Section::where('category', 'financialThanks')->orderBy('position')->get();
                $type = 'Finančná podpora';
                break;

            case 'other':
                $sections['otherWhy']    = Section::where('category', 'otherWhy')->orderBy('position')->get();
                $sections['otherTypes']  = Section::where('category', 'otherType')->orderBy('position')->get();
                $sections['otherIdea']   = Section::where('category', 'otherIdea')->orderBy('position')->get();
                $sections['otherThanks'] = Section::where('category', 'otherThanks')->orderBy('position')->get();
                $type = 'Iné formy podpory';
                break;
        }

        return view('pages.admin.support-edit', [
            'type' => $type,
            'sections' => $sections,
            'qrImage' => $qrImage,
        ]);
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function() use ($request, $id) {

            $sections = Section::where('category', $id)->get()->keyBy('id');

            $skData = $request->input('sk', []);
            $enData = $request->input('en', []);

            foreach ($skData as $index => $skItem) {

                $enItem = $enData[$index] ?? [];
                $sectionId = $skItem['id'] ?? null;
                $delete = ($skItem['_delete'] ?? 0) == 1;

                if ($sectionId && $delete) {
                    Section::where('id', $sectionId)->delete();
                    continue;
                }

                if ($sectionId && isset($sections[$sectionId])) {
                    $section = $sections[$sectionId];
                    $section->title_sk = $skItem['title'] ?? $section->title_sk;
                    $section->content_sk = $skItem['content'] ?? $section->content_sk;
                    $section->title_en = $enItem['title'] ?? $section->title_en;
                    $section->content_en = $enItem['content'] ?? $section->content_en;
                    $section->save();
                } else {
                    $maxPosition = Section::where('category', $id)->max('position') ?? 0;

                    Section::create([
                        'category'   => $id,
                        'title_sk'   => $skItem['title'] ?? '',
                        'content_sk' => $skItem['content'] ?? '',
                        'title_en'   => $enItem['title'] ?? '',
                        'content_en' => $enItem['content'] ?? '',
                        'position'   => $maxPosition + 1,
                    ]);
                }
            }

            if ($request->hasFile('qr_image') || $request->input('remove_qr_image')) {
                $this->handleQrImage($request, 'qrHow');
            }


        });

        return redirect()
            ->back()
            ->with('success', 'Zmeny boli uložené.');
    }

    private function handleQrImage(Request $request, $category)
    {
        $qrSectionId = Section::where('category', $category)->value('id');

        if (!$qrSectionId) {
            return;
        }

        if ($request->input('remove_qr_image') == 1) {
            $existingFile = DB::table('files')
                ->where('section_id', $qrSectionId)
                ->where('type', 'image')
                ->first();

            if ($existingFile) {
                if (Storage::disk('public')->exists($existingFile->url)) {
                    Storage::disk('public')->delete($existingFile->url);
                }

                DB::table('files')->where('id', $existingFile->id)->delete();
            }

            return;
        }

        if ($request->hasFile('qr_image')) {
            $file = $request->file('qr_image');

            $existingFile = DB::table('files')
                ->where('section_id', $qrSectionId)
                ->where('type', 'image')
                ->first();

            if ($existingFile) {
                if (Storage::disk('public')->exists($existingFile->url)) {
                    Storage::disk('public')->delete($existingFile->url);
                }
                DB::table('files')->where('id', $existingFile->id)->delete();
            }

            $path = $file->store('images/support', 'public');

            DB::table('files')->insert([
                'section_id' => $qrSectionId,
                'url' => $path,
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
