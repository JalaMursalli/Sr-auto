<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logo = Logo::first();
        return view('backend.logo.index',compact('logo'));
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
            'phone_title' => ['nullable','max:200'],
            'image' => ['image'],
            'image_light' => ['nullable','image'],
            'fav_icon' => ['nullable','image'],
        ]);
        $logo = Logo::first();
        if($request->hasFile('image')){
            $imagePath = handleUpload('image');
        }
        if($request->hasFile('image_light')){
            $imagelPath = handleUpload('image_light');
        }
         if($request->hasFile('fav_icon')){
            $favPath = handleUpload('fav_icon');
        }
        Logo::updateOrCreate(
            ['id' => $id],
            [
                'phone_title' => $request->phone_title,
                'image' => (!empty($imagePath) ? $imagePath : $logo?->image),
                'image_light' => (!empty($imagelPath) ? $imagelPath : $logo?->image_light),
                'fav_icon' => (!empty($favPath) ? $favPath : $logo?->fav_icon),
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
