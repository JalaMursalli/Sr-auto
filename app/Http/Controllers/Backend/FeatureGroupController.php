<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FeatureGroup;
use Illuminate\Http\Request;

class FeatureGroupController extends Controller
{
    public function index()
    {
        $featureGroups = FeatureGroup::latest()->get();
        return view('backend.feature-groups.index', compact('featureGroups'));
    }

    public function create()
    {
        return view('backend.feature-groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'icon' => 'nullable',
            'color' => 'nullable|string|max:7', 
        ]);

        $data = $request->all();

        if ($request->icon) {
            $file = $request->file('icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/icons'), $filename);
            $data['icon'] = 'uploads/icons/' . $filename;
        }

        FeatureGroup::create($data);

        return redirect()->route('backend.feature-groups.index')
            ->with('success', 'Feature group created successfully');
    }


    public function show(FeatureGroup $featureGroup)
    {
        return view('backend.feature-groups.show', compact('featureGroup'));
    }

    public function edit(FeatureGroup $featureGroup)
    {
        return view('backend.feature-groups.create', compact('featureGroup'));
    }

    public function update(Request $request, FeatureGroup $featureGroup)
    {
        $request->validate([
            'name_az' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'icon' => 'nullable',
            'color' => 'nullable|string|max:7',
        ]);

        $data = $request->all();


        if ($request->icon) {
            $file = $request->file('icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/icons'), $filename);
            $data['icon'] = 'uploads/icons/' . $filename;
        }


        $featureGroup->update($data);

        return redirect()->route('backend.feature-groups.index')
            ->with('success', 'Feature group updated successfully');
    }


    public function destroy(FeatureGroup $featureGroup)
    {
        $featureGroup->delete();

        return redirect()->route('backend.feature-groups.index')
            ->with('success', 'Feature group deleted successfully');
    }
}
