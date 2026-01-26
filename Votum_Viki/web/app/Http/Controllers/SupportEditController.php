<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Routing\Controller;

class SupportEditController extends Controller
{
    // 2%
    public function percent()
    {
        return view('admin.support-edit', [
            'why'    => Section::where('category', 'percentWhy')->orderBy('position')->get(),
            'info'   => Section::where('category', 'percentInfo')->orderBy('position')->get(),
            'how'    => Section::where('category', 'percentHow')->orderBy('position')->get(),
            'thanks' => Section::where('category', 'percentThanks')->orderBy('position')->get(),
        ]);
    }

    // Finančná pomoc
    public function financial()
    {
        return view('admin.support-edit', [
            'qrHow'  => Section::where('category', 'qrHow')->get(),
            'bank'   => Section::where('category', 'bank')->get(),
            'why'    => Section::where('category', 'financialWhy')->orderBy('position')->get(),
            'thanks' => Section::where('category', 'financialThanks')->orderBy('position')->get(),
        ]);
    }

    // Iná podpora
    public function other()
    {
        return view('admin.support-edit', [
            'why'    => Section::where('category', 'otherWhy')->orderBy('position')->get(),
            'thanks' => Section::where('category', 'otherThanks')->orderBy('position')->get(),
            'types'  => Section::where('category', 'otherType')->orderBy('position')->get(),
            'idea'   => Section::where('category', 'otherIdea')->orderBy('position')->get(),
        ]);
    }
}
