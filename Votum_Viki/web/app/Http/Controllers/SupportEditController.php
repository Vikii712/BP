<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Routing\Controller;

class SupportEditController extends Controller
{
    public function edit($type)
    {
        $sections = [];

        switch($type) {
            case 'percent':
                $sections['percentWhy']    = Section::where('category', 'percentWhy')->orderBy('position')->get();
                $sections['percentInfo']   = Section::where('category', 'percentInfo')->orderBy('position')->get();
                $sections['percentHow']    = Section::where('category', 'percentHow')->orderBy('position')->get();
                $sections['percentThanks'] = Section::where('category', 'percentThanks')->orderBy('position')->get();
                $type = 'Dve percentá';
                break;

            case 'financial':
                $sections['financialWhy']    = Section::where('category', 'financialWhy')->orderBy('position')->get();
                $sections['qrHow']  = Section::where('category', 'qrHow')->get();
                $sections['bank']   = Section::where('category', 'bank')->get();
                $sections['financialThanks'] = Section::where('category', 'financialThanks')->orderBy('position')->get();
                $type = 'Finančná podpora';
                break;

            case 'other':
                $sections['otherWhy']    = Section::where('category', 'otherWhy')->orderBy('position')->get();
                $sections['otherTypes']  = Section::where('category', 'otherType')->orderBy('position')->get();
                $sections['otherIdea']   = Section::where('category', 'otherIdea')->orderBy('position')->get();
                $sections['otherThanks'] = Section::where('category', 'otherThanks')->orderBy('position')->get();
                $type = 'Iné formy podpory';
                break;
        }

        return view('pages.admin.support-edit', [
            'type' => $type,
            'sections' => $sections,
        ]);
    }
}
