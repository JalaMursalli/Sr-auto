<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Success;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class SuccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $success = Success::first();
        return view('backend.success.index',compact('success'));
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
    public function update(Request $request, $id)
    {
         $request->validate([
            'title_az' => ['nullable', 'max:200'],
            'title_en' => ['nullable', 'max:200'],
            'title_ru' => ['nullable', 'max:200'],
            'btn_title_az' => ['nullable','max:200'],
            'btn_title_en' => ['nullable','max:200'],
            'btn_title_ru' => ['nullable','max:200'],
            'address_title_az' => ['nullable','max:200'],
            'address_title_en' => ['nullable','max:200'],
            'address_title_ru' => ['nullable','max:200'],
            'description_az' => ['nullable'],
            'description_en' => ['nullable'],
            'description_ru' => ['nullable'],
            'image' =>['nullable','image'],
            'url' => ['nullable','url'],

        ]);

        $success = Success::findOrFail(1);
        if ($request->hasFile('image')) {
            $imagePath = handleUpload('image');
        } else {
            $imagePath = $success->image;
        }
            Success::updateOrCreate(
            ['id' => 1],
            [
                'title_az' => $request->title_az,
                'title_en' => $request->title_en,
                'title_ru' => $request->title_ru,
                'btn_title_az' => $request->btn_title_az,
                'btn_title_en' => $request->btn_title_en,
                'btn_title_ru' => $request->btn_title_ru,
                'description_az' => $request->description_az,
                'description_en' => $request->description_en,
                'description_ru' => $request->description_ru,
                'url' => $request->url,
                'image' => (!empty($imagePath) ? $imagePath : $success?->image)
            ]
        );
        $success->save();
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
