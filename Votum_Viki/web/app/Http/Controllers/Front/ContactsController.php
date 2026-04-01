<?php

namespace App\Http\Controllers\Front;

use App\Models\Section;
use Illuminate\Routing\Controller;

class ContactsController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();
        $isSK = $locale === 'sk';

        return view('front::pages.contacts', [
            'address' => Section::where('category', 'address')->get(),
            'mail' => Section::where('category', 'email')->get(),
            'phone' => Section::where('category', 'tel')->get(),
            'identification' => Section::where('category', 'identification')->get(),
            'bank' => Section::where('category', 'bank')->get(),
            'isSK' => $isSK,
        ]);
    }
}
