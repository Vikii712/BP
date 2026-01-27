<?php

namespace App\Http\Controllers;

use App\Models\Section;

class ContactsEditController
{
    public function edit()
    {
        $sections = [];

        $sections['address'] = Section::where('category', 'address')->get();
        $sections['mail'] = Section::where('category', 'email')->get();
        $sections['phone'] = Section::where('category', 'tel')->get();
            $sections['bank'] = Section::where('category', 'bank')->get();
        $sections['map'] = Section::where('category', 'map')->get();

        return view('pages.admin.contacts-edit', [
            'sections' => $sections
        ]);
    }
}
