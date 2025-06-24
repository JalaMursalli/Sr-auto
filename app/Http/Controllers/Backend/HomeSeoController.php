<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeSeo;
use Illuminate\Http\Request;

class HomeSeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home = HomeSeo::first();
        return view('backend.home-seo.index',compact('home'));
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

            'meta_title_az'=> ['nullable', 'max:200'],
            'meta_title_en'=> ['nullable', 'max:200'],
            'meta_title_ru'=> ['nullable', 'max:200'],
            'meta_description_az' => ['nullable'],
            'meta_description_en' => ['nullable'],
            'meta_description_ru' => ['nullable'],
            'image' => ['nullable', 'image'],
        ]);
        $home = HomeSeo::first();
        $imagePath = handleUpload('image');
        HomeSeo::updateOrCreate(
            ['id' => $id],
            [
                'meta_title_az' => $request->meta_title_az,
                'meta_title_en' => $request->meta_title_en,
                'meta_title_ru' => $request->meta_title_ru,
                'meta_description_az' => $request->meta_description_az,
                'meta_description_en' => $request->meta_description_en,
                'meta_description_ru' => $request->meta_description_ru,
                'image' => (!empty($imagePath) ? $imagePath : $home?->image),

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
