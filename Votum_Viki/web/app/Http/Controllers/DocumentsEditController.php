<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DocumentsEditController
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

        return view('pages.admin.documents-edit', [
            'sections' => $sections,
        ]);
    }
}
