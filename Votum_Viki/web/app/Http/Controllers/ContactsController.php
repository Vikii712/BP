<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Routing\Controller;

class ContactsController extends Controller
{
    public function index()
    {
        $locale = session('locale', 'sk');
        $isSK = $locale === 'sk';

        return view('pages.contacts', [
            'address' => Section::where('category', 'address')->get(),
            'mail' => Section::where('category', 'email')->get(),
            'phone' => Section::where('category', 'tel')->get(),
            'identification' => Section::where('category', 'identification')->get(),
            'bank' => Section::where('category', 'bank')->get(),
            'map' => Section::where('category', 'map')->get(),
            'isSK' => $isSK,
        ]);
    }
}
