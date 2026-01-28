<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentsEditController extends Controller
{
    public function edit()
    {
        $sections = DB::table('sections')
            ->where('category', 'documentSection')
            ->orderBy('position')
            ->get()
            ->map(function ($section) {
                $section->documents = DB::table('files')
                    ->where('section_id', $section->id)
                    ->where('type', 'document')
                    ->orderBy('id')
                    ->get();

                return $section;
            });

        return view('pages.admin.documents-edit', compact('sections'));
    }

    public function update(Request $request)
    {
        // Validácia
        $request->validate([
            'sections.*.name_sk' => 'nullable|string|max:255',
            'sections.*.name_en' => 'nullable|string|max:255',
            'sections.*.documents.*.name_sk' => 'nullable|string|max:255',
            'sections.*.documents.*.name_en' => 'nullable|string|max:255',
            'sections.*.documents.*.file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);

        DB::transaction(function () use ($request) {

            $incomingSectionIds = [];

            foreach ($request->sections ?? [] as $sectionIndex => $sectionData) {

                // ===== SEKCIA =====
                if (!empty($sectionData['id'])) {
                    // Update existujúcej sekcie
                    DB::table('sections')
                        ->where('id', $sectionData['id'])
                        ->update([
                            'title_sk' => $sectionData['name_sk'] ?? '',
                            'title_en' => $sectionData['name_en'] ?? '',
                            'content_sk' => $sectionData['content_sk'] ?? '',
                            'content_en' => $sectionData['content_en'] ?? '',
                            'position' => $sectionIndex,
                            'updated_at' => now(),
                        ]);

                    $sectionId = $sectionData['id'];
                } else {
                    // Vytvorenie novej sekcie
                    $sectionId = DB::table('sections')->insertGetId([
                        'title_sk' => $sectionData['name_sk'] ?? '',
                        'title_en' => $sectionData['name_en'] ?? '',
                        'content_sk' => $sectionData['content_sk'] ?? '',
                        'content_en' => $sectionData['content_en'] ?? '',
                        'category' => 'documentSection',
                        'position' => $sectionIndex,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                $incomingSectionIds[] = $sectionId;

                // ===== DOKUMENTY =====
                $incomingDocIds = [];

                foreach ($sectionData['documents'] ?? [] as $docIndex => $docData) {

                    // Ak dokument existuje, aktualizuj ho
                    if (!empty($docData['id'])) {
                        $updateData = [
                            'title_sk' => $docData['name_sk'] ?? '',
                            'title_en' => $docData['name_en'] ?? '',
                            'updated_at' => now(),
                        ];

                        // Ak je nahraný nový súbor
                        if ($request->hasFile("sections.{$sectionIndex}.documents.{$docIndex}.file")) {
                            $file = $request->file("sections.{$sectionIndex}.documents.{$docIndex}.file");

                            // Vymaž starý súbor
                            $oldDoc = DB::table('files')->where('id', $docData['id'])->first();
                            if ($oldDoc && $oldDoc->url) {
                                Storage::disk('public')->delete($oldDoc->url);
                            }

                            // Ulož nový súbor
                            $path = $file->store('documents', 'public');
                            $updateData['url'] = $path;
                        }

                        DB::table('files')
                            ->where('id', $docData['id'])
                            ->update($updateData);

                        $docId = $docData['id'];
                    } else {
                        // Vytvorenie nového dokumentu
                        $insertData = [
                            'section_id' => $sectionId,
                            'title_sk' => $docData['name_sk'] ?? '',
                            'title_en' => $docData['name_en'] ?? '',
                            'type' => 'document',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];

                        // Ak je nahraný súbor
                        if ($request->hasFile("sections.{$sectionIndex}.documents.{$docIndex}.file")) {
                            $file = $request->file("sections.{$sectionIndex}.documents.{$docIndex}.file");
                            $path = $file->store('documents', 'public');
                            $insertData['url'] = $path;
                        }

                        $docId = DB::table('files')->insertGetId($insertData);
                    }

                    $incomingDocIds[] = $docId;
                }

                // Vymaž dokumenty, ktoré už nie sú v sekcii
                $documentsToDelete = DB::table('files')
                    ->where('section_id', $sectionId)
                    ->where('type', 'document')
                    ->whereNotIn('id', $incomingDocIds)
                    ->get();

                foreach ($documentsToDelete as $doc) {
                    if ($doc->url) {
                        Storage::disk('public')->delete($doc->url);
                    }
                }

                DB::table('files')
                    ->where('section_id', $sectionId)
                    ->where('type', 'document')
                    ->whereNotIn('id', $incomingDocIds)
                    ->delete();
            }

            // Vymaž sekcie, ktoré už nie sú v requeste
            $sectionsToDelete = DB::table('sections')
                ->where('category', 'documentSection')
                ->whereNotIn('id', $incomingSectionIds)
                ->get();

            foreach ($sectionsToDelete as $section) {
                // Najprv vymaž všetky súbory v sekcii
                $docs = DB::table('files')
                    ->where('section_id', $section->id)
                    ->where('type', 'document')
                    ->get();

                foreach ($docs as $doc) {
                    if ($doc->url) {
                        Storage::disk('public')->delete($doc->url);
                    }
                }

                // Vymaž dokumenty
                DB::table('files')
                    ->where('section_id', $section->id)
                    ->where('type', 'document')
                    ->delete();
            }

            // Vymaž sekcie
            DB::table('sections')
                ->where('category', 'documentSection')
                ->whereNotIn('id', $incomingSectionIds)
                ->delete();
        });

        return redirect()->route('documents.edit')->with('success', 'Zmeny boli úspešne uložené!');
    }
}
