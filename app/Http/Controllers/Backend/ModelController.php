<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brend;
use App\Models\Fuel;
use App\Models\Model;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $models = Model::when($search, function ($query, $search) {
            return $query->where('name_az', 'like', "%{$search}%")
                ->orWhere('name_en', 'like', "%{$search}%")
                ->orWhere('name_ru', 'like', "%{$search}%");
            ;

        })->paginate(10);

        $brends = Brend::all();
        return view('backend.model.index', compact('search', 'models', 'brends'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new Model();
        $brends = Brend::all();
        $fuels = Fuel::orderBy('created_at', 'desc')->get();
        return view('backend.model.create', compact('model', 'brends', 'fuels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_az' => ['required', 'max:200'],
            'name_en' => ['required', 'max:200'],
            'name_ru' => ['required', 'max:200'],
            'brend_id' => ['required', 'integer', 'exists:brends,id'],
            'fuel_ids' => ['nullable', 'array'],
            'fuel_ids.*' => ['required', 'integer', 'exists:fuels,id'],
        ]);
        $model = new Model();
        $model->name_az = $request->name_az;
        $model->name_en = $request->name_en;
        $model->name_ru = $request->name_ru;
        $model->brend_id = $request->brend_id;
        $model->save();
        $model->fuels()->sync($request->get('fuel_ids', []));
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.model.index');
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
        $model = Model::findOrFail($id);
        $brends = Brend::all();
        $fuels = Fuel::orderBy('created_at', 'desc')->get();
        return view('backend.model.edit', compact('model', 'brends', 'fuels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_az' => ['required', 'max:200'],
            'name_en' => ['required', 'max:200'],
            'name_ru' => ['required', 'max:200'],
            'brend_id' => ['required', 'integer', 'exists:brends,id'],
            'fuel_ids' => ['nullable', 'array'],
            'fuel_ids.*' => ['required', 'integer', 'exists:fuels,id'],
        ]);
        $model = Model::findOrFail($id);
        $model->name_az = $request->name_az;
        $model->name_en = $request->name_en;
        $model->name_ru = $request->name_ru;
        $model->brend_id = $request->brend_id;
        $model->save();
        $model->fuels()->sync($request->get('fuel_ids', []));
        toastr()->success('Uğurla update olundu');
        return redirect()->route('backend.model.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Model::findOrFail($id);
        $model->delete();
        return redirect()->route('backend.model.index')->with('success', 'Uğurla silindi!');
    }
}
