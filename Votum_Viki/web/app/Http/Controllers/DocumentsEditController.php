<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File;

class DocumentsEditController extends Controller
{
    public function edit($id)
    {
        $section = Section::where('category', 'documentSection')
            ->where('id', $id)
            ->firstOrFail();

        $section->documents = File::where('section_id', $section->id)
            ->where('type', 'document')
            ->orderBy('id')
            ->get();

        return view('pages.admin.documents-edit',
            compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'section_id' => 'required|integer|exists:sections,id',
            'section.name_sk' => 'required|string|max:255',
            'section.name_en' => 'required|string|max:255',
            'documents.*.name_sk' => 'nullable|string|max:255',
            'documents.*.name_en' => 'nullable|string|max:255',
            'documents.*.file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
        ]);

        DB::transaction(function () use ($request) {

            $sectionId = $request->section_id;

            // ===== AKTUALIZUJ SEKCIU =====
            DB::table('sections')
                ->where('id', $sectionId)
                ->update([
                    'title_sk' => $request->input('section.name_sk'),
                    'title_en' => $request->input('section.name_en'),
                    'updated_at' => now(),
                ]);

            // ===== DOKUMENTY =====
            $incomingDocIds = [];

            foreach ($request->input('documents', []) as $docIndex => $docData) {

                if (!empty($docData['id'])) {
                    // Update existujúceho dokumentu
                    $file = File::find($docData['id']);

                    if ($file) {
                        $file->title_sk = $docData['name_sk'] ?? '';
                        $file->title_en = $docData['name_en'] ?? '';

                        if ($request->hasFile("documents.{$docIndex}.file")) {
                            $path = $request->file("documents.{$docIndex}.file")->store('documents', 'public');
                            $file->url = $path;
                        }

                        $file->save();
                        $incomingDocIds[] = $file->id;
                    }
                } else {
                    // Nový dokument
                    $fileData = [
                        'section_id' => $sectionId,
                        'title_sk' => $docData['name_sk'] ?? '',
                        'title_en' => $docData['name_en'] ?? '',
                        'type' => 'document',
                    ];

                    if ($request->hasFile("documents.{$docIndex}.file")) {
                        $uploadedFile = $request->file("documents.{$docIndex}.file");
                        $filename = time() . '_' . $uploadedFile->getClientOriginalName();
                        $path = $uploadedFile->storeAs('documents', $filename, 'public');
                        $fileData['url'] = $path;
                    }

                    $newFile = File::create($fileData);
                    $incomingDocIds[] = $newFile->id;
                }
            }

            // Soft delete dokumentov ktoré boli odstránené z formulára
            File::where('section_id', $sectionId)
                ->where('type', 'document')
                ->whereNotIn('id', $incomingDocIds)
                ->delete();
        });

        return redirect()->back()->with('success', 'Zmeny boli úspešne uložené!');
    }
}
