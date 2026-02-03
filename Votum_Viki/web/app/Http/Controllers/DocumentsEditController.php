<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class DocumentsEditController extends Controller
{
    public function edit()
    {
        $sections = DB::table('sections')
            ->where('category', 'documentSection')
            ->orderBy('position')
            ->get()
            ->map(function ($section) {
                $section->documents = File::where('section_id', $section->id)
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
            'sections.*.documents.*.file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
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
                        $file = File::find($docData['id']);

                        if ($file) {
                            $file->title_sk = $docData['name_sk'] ?? '';
                            $file->title_en = $docData['name_en'] ?? '';

                            // Ak je nahraný nový súbor
                            if ($request->hasFile("sections.{$sectionIndex}.documents.{$docIndex}.file")) {
                                $uploadedFile = $request->file("sections.{$sectionIndex}.documents.{$docIndex}.file");

                                // SOFT DELETE: Neukladáme starý súbor, len nahrávame nový
                                $path = $uploadedFile->store('documents', 'public');
                                $file->url = $path;
                            }

                            $file->save();
                            $docId = $file->id;
                        }
                    } else {
                        // Vytvorenie nového dokumentu
                        $fileData = [
                            'section_id' => $sectionId,
                            'title_sk' => $docData['name_sk'] ?? '',
                            'title_en' => $docData['name_en'] ?? '',
                            'type' => 'document',
                        ];

                        // Ak je nahraný súbor
                        if ($request->hasFile("sections.{$sectionIndex}.documents.{$docIndex}.file")) {
                            $uploadedFile = $request->file("sections.{$sectionIndex}.documents.{$docIndex}.file");
                            $path = $uploadedFile->store('documents', 'public');
                            $fileData['url'] = $path;
                        }

                        $newFile = File::create($fileData);
                        $docId = $newFile->id;
                    }

                    $incomingDocIds[] = $docId;
                }

                // SOFT DELETE dokumentov, ktoré už nie sú v sekcii
                File::where('section_id', $sectionId)
                    ->where('type', 'document')
                    ->whereNotIn('id', $incomingDocIds)
                    ->delete(); // Soft delete
            }

            // SOFT DELETE sekcií a ich dokumentov
            $sectionsToDelete = DB::table('sections')
                ->where('category', 'documentSection')
                ->whereNotIn('id', $incomingSectionIds)
                ->pluck('id');

            foreach ($sectionsToDelete as $sectionId) {
                // Soft delete všetkých dokumentov v sekcii
                File::where('section_id', $sectionId)
                    ->where('type', 'document')
                    ->delete(); // Soft delete
            }

            // Vymaž sekcie (toto je hard delete, ak chceš soft delete aj na sekciách, musíš pridať SoftDeletes do Section modelu)
            DB::table('sections')
                ->where('category', 'documentSection')
                ->whereNotIn('id', $incomingSectionIds)
                ->delete();
        });

        return redirect()->route('documents.edit')->with('success', 'Zmeny boli úspešne uložené!');
    }
}
