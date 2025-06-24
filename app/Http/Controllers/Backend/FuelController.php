<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fuel;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $fuels = Fuel::when($search, function ($query, $search) {
            return $query->where('name_az', 'like', "%{$search}%")
            ->orWhere('name_en', 'like', "%{$search}%")
            ->orWhere('name_ru', 'like', "%{$search}%");;

        })->paginate(10);

        return view('backend.fuel.index', compact('search', 'fuels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fuel = new Fuel();
        return view('backend.fuel.create',compact('fuel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_az'=> ['required','max:200'],
            'name_en' => ['required','max:200'],
            'name_ru' => ['required','max:200'],
            'icon' => ['nullable','image']
        ]);
        $iconPath = handleUpload('icon');
        $fuel = new Fuel();
        $fuel->name_az = $request->name_az;
        $fuel->name_en = $request->name_en;
        $fuel->name_ru = $request->name_ru;
        $fuel->icon = $iconPath;
        $fuel->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.fuel.index');

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
        $fuel = Fuel::findOrFail($id);
        return view('backend.fuel.edit',compact('fuel'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_az'=> ['required','max:200'],
            'name_en' => ['required','max:200'],
            'name_ru' => ['required','max:200'],
            'icon' => ['nullable','image']
        ]);
        $iconPath = handleUpload('icon');
        $fuel = Fuel::findOrFail($id);
        $fuel->name_az = $request->name_az;
        $fuel->name_en = $request->name_en;
        $fuel->name_ru = $request->name_ru;
        $fuel->icon = (!empty($iconPath)? $iconPath : $fuel->icon );
        $fuel->save();
        toastr()->success('Uğurla update olundu');
        return redirect()->route('backend.fuel.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fuel = Fuel::findOrFail($id);
        $fuel->delete();
        return redirect()->route('backend.fuel.index')->with('success', 'Uğurla silindi!');
    }
}
