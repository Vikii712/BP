<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class HistoryEditController extends Controller
{
    public function edit()
    {
        $history = Section::where('category', 'history')
            ->orderBy('position')
            ->get();

        return view('pages.admin.history-edit', compact('history'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'sk.title'   => 'required|string|max:255',
            'en.title'   => 'required|string|max:255',
            'sk.content' => 'required|string',
            'en.content' => 'required|string',
            'year'       => 'required|integer',
        ]);

        $insertBefore = Section::where('category', 'history')
            ->where('year', '>', $request->year)
            ->orderBy('position')
            ->first();

        if ($insertBefore) {
            $newPosition = $insertBefore->position;
        } else {
            $newPosition = (Section::where('category', 'history')->max('position') ?? 0) + 1;
        }

        Section::where('category', 'history')
            ->where('position', '>=', $newPosition)
            ->increment('position');

        Section::create([
            'title_sk'   => $request->input('sk.title'),
            'title_en'   => $request->input('en.title'),
            'content_sk' => $request->input('sk.content'),
            'content_en' => $request->input('en.content'),
            'year'       => $request->year,
            'position'   => $newPosition,
            'category'   => 'history',
        ]);

        return redirect()->back()->with('success', 'Udalosť bola pridaná.');
    }



    public function editItem($id)
    {
        $item = Section::where('category', 'history')->findOrFail($id);
        return view('pages.admin.history-edit-item', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Section::where('category', 'history')->findOrFail($id);

        $request->validate([
            'title_sk' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_sk' => 'nullable|string',
            'content_en' => 'nullable|string',
            'year' => 'required|integer',
        ]);

        $item->update([
            'title_sk' => $request->title_sk,
            'title_en' => $request->title_en,
            'content_sk' => $request->content_sk,
            'content_en' => $request->content_en,
            'year' => $request->year,
        ]);

        return redirect()->route('history.edit')->with('success', 'Udalosť bola upravená.');
    }

    public function delete($id)
    {
        $item = Section::where('category', 'history')->findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Udalosť bola vymazaná.');
    }

    public function moveUp($id)
    {
        $item = Section::where('category', 'history')->findOrFail($id);
        if ($item->position > 1) {
            $swap = Section::where('category', 'history')
                ->where('position', $item->position - 1)
                ->first();
            if ($swap) {
                $swap->update(['position' => $item->position]);
            }
            $item->update(['position' => $item->position - 1]);
        }
        return redirect()->back();
    }

    public function moveDown($id)
    {
        $item = Section::where('category', 'history')->findOrFail($id);
        $maxPosition = Section::where('category', 'history')->max('position');
        if ($item->position < $maxPosition) {
            $swap = Section::where('category', 'history')
                ->where('position', $item->position + 1)
                ->first();
            if ($swap) {
                $swap->update(['position' => $item->position]);
            }
            $item->update(['position' => $item->position + 1]);
        }
        return redirect()->back();
    }
}
