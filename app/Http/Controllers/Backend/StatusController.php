<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $search = $request->input('search');
        $status_s = Status::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");

        })->paginate(10);
        return view('backend.status.index', compact('search', 'status_s'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $status = new Status();
        return view('backend.status.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
        'title_az' => ['nullable','max:200'],
        'title_en' => ['nullable','max:200'],
        'title_ru' => ['nullable','max:200'],
        'icon' => ['nullable','image'],
        ]);
        $iconPath = handleUpload('icon');
        $status = new Status();
        $status->icon = $iconPath;
        $status->title_az = $request->title_az;
        $status->title_en = $request->title_en;
        $status->title_ru = $request->title_ru;
        $status->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.status.index');
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
        $status = Status::findOrFail($id);
        return view('backend.status.edit',compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
            'title_az' => ['required','max:200'],
            'title_en' => ['required','max:200'],
            'title_ru' => ['required','max:200'],
            'icon' => ['nullable','image'],

            ]);
            $iconPath = handleUpload('icon');
            $status =Status::findOrFail($id);
            $status->icon =  (!empty($iconPath)? $iconPath : $status->icon ) ;
            $status->title_az = $request->title_az;
            $status->title_en = $request->title_en;
            $status->title_ru = $request->title_ru;
            $status->save();
            toastr()->success('Uğurla yaradıldı');
            return redirect()->route('backend.status.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status =Status::findOrFail($id);
        deleteFileIfExist(filePath: $status->icon);
        $status->delete();
        return redirect()->route('backend.status.index')->with('success', 'Uğurla silindi!');
    }
}
