<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactSeo;
use Illuminate\Http\Request;

class ContactSeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = ContactSeo::first();
        return view('backend.contact-seo.index',compact('contact'));
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
        $contact = ContactSeo::first();
         $imagePath = handleUpload('image');
        ContactSeo::updateOrCreate(
            ['id' => $id],
            [
                'meta_title_az' => $request->meta_title_az,
                'meta_title_en' => $request->meta_title_en,
                'meta_title_ru' => $request->meta_title_ru,
                'meta_description_az' => $request->meta_description_az,
                'meta_description_en' => $request->meta_description_en,
                'meta_description_ru' => $request->meta_description_ru,
                 'image' => (!empty($imagePath) ? $imagePath : $contact?->image),
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
