<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Section;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SupportController extends Controller
{
    public function index()
    {
        $locale = session('locale', 'sk');

        $why = Section::where('category', 'support')
            ->get()
            ->map(fn($item) => [
                'title' => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ])->first();

        return view('pages.support', [
            'why' => $why,
            ]);
    }

    public function percent()
    {
        $locale = session('locale', 'sk');

        $why = Section::where('category', 'percentWhy')
            ->orderBy('position')
            ->get()
            ->map(fn($item) => [
                'title'   => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ])->first();

        $info = Section::where('category', 'percentInfo')
            ->orderBy('position')
            ->get()
            ->map(fn($item) => [
                'name'  => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'value' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ]);

        $how = Section::where('category', 'percentHow')
            ->orderBy('position')
            ->get()
            ->map(fn($item) => [
                'title'   => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ]);

        $thanks = Section::where('category', 'percentThanks')
            ->orderBy('position')
            ->get()
            ->map(fn($item) => [
                'title'   => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ])->first();


        $documents = File::where('type', 'document')
            ->whereNotNull('section_id')
            ->get();

        return view('pages.2percent', [
            'why'       => $why,
            'info'      => $info,
            'how'       => $how,
            'thanks'    => $thanks,
            'documents' => $documents,
        ]);
    }

    public function financial()
    {
        $locale = session('locale', 'sk');

        $qrHowSectionId = Section::where('category', 'qrHow')->value('id');

        $qrImage = $qrHowSectionId
            ? DB::table('files')
                ->where('section_id', $qrHowSectionId)
                ->where('type', 'image')
                ->value('url')
            : null;

        $qrhow = Section::where('category', 'qrHow')
            ->get()
            ->map(fn($item) => [
                'title' => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ])->first();

        $bank = Section::where('category', 'bank')
            ->get()
            ->map(fn($item) => [
                'title' => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ]);

        $thanks = Section::where('category', 'financialThanks')
            ->orderBy('position')
            ->get()
            ->map(fn($item) => [
                'title'   => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ])->first();

        $why = Section::where('category', 'financialWhy')
            ->orderBy('position')
            ->get()
            ->map(fn($item) => [
                'title'   => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ])->first();

        return view('pages.financial', [
            'qrHow'   => $qrhow,
            'qrImage' => $qrImage,
            'bank'    => $bank,
            'thanks'  => $thanks,
            'why'     => $why,
        ]);
    }

    public function other()
    {
        $locale = session('locale', 'sk');

        $thanks = Section::where('category', 'otherThanks')
            ->orderBy('position')
            ->get()
            ->map(fn($item) => [
                'title'   => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ])->first();

        $why = Section::where('category', 'otherWhy')
            ->orderBy('position')
            ->get()
            ->map(fn($item) => [
                'title'   => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ])->first();

        $types = Section::where('category', 'otherType')
            ->orderBy('position')
            ->get()
            ->map(fn($item) => [
                'title'   => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ]);

        $otherIdea = Section::where('category', 'otherIdea')
            ->orderBy('position')
            ->get()
            ->map(fn($item) => [
                'title'   => $locale === 'sk' ? $item->title_sk : $item->title_en,
                'content' => $locale === 'sk' ? $item->content_sk : $item->content_en,
            ])->first();

        return view('pages.other', [
            'thanks' => $thanks,
            'why'     => $why,
            'types'   => $types,
            'idea' => $otherIdea,
        ]);
    }

}
