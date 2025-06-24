<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');
        $banners = Banner::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");

        })->paginate(10);
        return view('backend.banner.index', compact('search', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banner = new Banner();
        return view('backend.banner.create',compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'title_az' => ['required','max:200'],
        'title_en' => ['required','max:200'],
        'title_ru' => ['required','max:200'],
        'image' => ['required','image']
        ]);
        $imagePath = handleUpload('image');
        $banner = new Banner();
        $banner->image = $imagePath;
        $banner->title_az = $request->title_az;
        $banner->title_en = $request->title_en;
        $banner->title_ru = $request->title_ru;
        $banner->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.banner.index');
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
        $banner = Banner::findOrFail($id);
        return view('backend.banner.edit',compact('banner'));
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
            'image' => ['image']
            ]);
            $imagePath = handleUpload('image');
            $banner = Banner::findOrFail($id);
            $banner->image = (!empty($imagePath) ? $imagePath : $banner->image);
            $banner->title_az = $request->title_az;
            $banner->title_en = $request->title_en;
            $banner->title_ru = $request->title_ru;
            $banner->save();
            toastr()->success('Uğurla yaradıldı');
            return redirect()->route('backend.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);
        deleteFileIfExist(filePath: $banner->image);
        $banner->delete();
    }
}
