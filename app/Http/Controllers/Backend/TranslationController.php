<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $translations = Translation::when($search, function ($query, $search) {
            return $query->where('value_az', 'like', "%{$search}%")
            ->orWhere('value_en', 'like', "%{$search}%")
            ->orWhere('value_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.translation.index', compact('search', 'translations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $translation = new Translation();
        return view('backend.translation.create',compact('translation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => ['unique:translations,key'],
            'value_az' => ['required'],
            'value_en' => ['required'],
            'value_ru' => ['required'],
        ]);
        $translation = new Translation();
        $translation->key = $request->key;
        $translation->value_az = $request->value_az;
        $translation->value_en = $request->value_en;
        $translation->value_ru = $request->value_ru;
        $translation->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.translation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $translation = Translation::findOrFail($id);
        return view('backend.translation.edit',compact('translation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'key' => ['unique:translations,key,'.$id],
            'value_az' => ['required'],
            'value_en' => ['required'],
            'value_ru' => ['required'],
        ]);
        $translation = Translation::findOrFail($id);
        $translation->key = $request->key;
        $translation->value_az = $request->value_az;
        $translation->value_en = $request->value_en;
        $translation->value_ru = $request->value_ru;
        $translation->save();
        toastr()->success('Uğurla yeniləndi');
        return redirect()->route('backend.translation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $translation = Translation::findOrFail($id);
        $translation->delete();
        return redirect()->route('backend.translation.index')->with('success', 'Uğurla silindi!');
    }
}
