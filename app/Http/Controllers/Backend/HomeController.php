<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $home = Home::first();
        return view('backend.home-banner.index',compact('home'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title_az' => ['nullable','max:200'],
            'title_en' => ['nullable','max:200'],
            'title_ru' => ['nullable','max:200'],
            'banner' => ['nullable', 'file',
            'mimetypes:image/jpeg,image/png,
            image/webp,video/mp4,video/avi,
            video/mpeg', 'max:51200'],
        ]);



        $home = Home::findOrFail($id);
        if($request->hasFile('banner')){
            $bannerPath = handleUpload('banner');
        }
        $home->updateOrCreate(
            ['id' => $id],
            [
                'title_az' => $request->title_az,
                'title_en' => $request->title_en,
                'title_ru' => $request->title_ru,
                'banner' => (!empty($bannerPath)? $bannerPath :$home?->banner),
            ]
        );
        toastr()->success('Uğurla yeniləndi', 'Congrats');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
