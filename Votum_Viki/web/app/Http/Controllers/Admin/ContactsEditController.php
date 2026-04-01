<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;

class ContactsEditController
{
    public function edit()
    {
        $sections = [];

        $sections['address'] = Section::where('category', 'address')->get();
        $sections['email'] = Section::where('category', 'email')->get();
        $sections['tel'] = Section::where('category', 'tel')->get();
        $sections['bank'] = Section::where('category', 'bank')->get();

        return view('admin::pages.contacts-edit', [
            'sections' => $sections
        ]);
    }

}
