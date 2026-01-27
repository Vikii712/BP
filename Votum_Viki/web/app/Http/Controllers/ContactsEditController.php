<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactsEditController
{
    public function edit()
    {
        $sections = [];

        $sections['address'] = Section::where('category', 'address')->get();
        $sections['email'] = Section::where('category', 'email')->get();
        $sections['tel'] = Section::where('category', 'tel')->get();
            $sections['bank'] = Section::where('category', 'bank')->get();
        $sections['map'] = Section::where('category', 'map')->get();

        return view('pages.admin.contacts-edit', [
            'sections' => $sections
        ]);
    }

}
