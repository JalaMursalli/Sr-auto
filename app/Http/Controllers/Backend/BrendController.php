<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brend;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $brends = Brend::when($search, function ($query, $search) {
            return $query->where('name_az', 'like', "%{$search}%")
            ->orWhere('name_en', 'like', "%{$search}%")
            ->orWhere('name_ru', 'like', "%{$search}%");;

        })->paginate(10);

        return view('backend.brend.index', compact('search', 'brends'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brend = new Brend();
        return view('backend.brend.create',compact('brend'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'name_az' => ['required','max:200'],
          'name_en' => ['required','max:200'],
          'name_ru' => ['required','max:200'],
          'alt_image_az' => ['nullable','max:200'],
          'alt_image_en' => ['nullable','max:200'],
          'alt_image_ru' => ['nullable','max:200'],
         'image_title_az' => ['nullable','max:200'],
          'image_title_en' => ['nullable','max:200'],
          'image_title_ru' => ['nullable','max:200'],
          'image' => ['required','image'],
          'url' => ['nullable', 'url'],
          'phone_number' => ['nullable', 'max:200'],
          'country_az' => ['nullable','max:200'],
          'country_en' => ['nullable','max:200'],
          'country_ru' => ['nullable','max:200'],
          'vp_url' => ['nullable','url'],
        ]);

        $imagePath = handleUpload('image');
        $brend = new Brend();
        $brend->image = $imagePath;
        $brend->name_az = $request->name_az;
        $brend->name_en = $request->name_en;
        $brend->name_ru = $request->name_ru;
        $brend->slug_az = Str::slug($request->name_az);
        $brend->slug_en = Str::slug($request->name_en);
        $brend->slug_ru = Str::slug($request->name_ru);
        $brend->alt_image_az = $request->alt_image_az;
        $brend->alt_image_en = $request->alt_image_en;
        $brend->alt_image_ru = $request->alt_image_ru;
        $brend->image_title_az = $request->image_title_az;
        $brend->image_title_en = $request->image_title_en;
        $brend->image_title_ru = $request->image_title_ru;
        $brend->url = $request->url;
        $brend->phone_number = $request->phone_number;
        $brend->country_az = $request->country_az;
        $brend->country_en = $request->country_en;
        $brend->country_ru = $request->country_ru;
        $brend->vp_url = $request->vp_url;
        $brend->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.brend.index');
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
        $brend = Brend::findOrFail($id);
        return view('backend.brend.edit',compact('brend'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_az' => ['required','max:200'],
            'name_en' => ['required','max:200'],
            'name_ru' => ['required','max:200'],
            'alt_image_az' => ['nullable','max:200'],
            'alt_image_en' => ['nullable','max:200'],
            'alt_image_ru' => ['nullable','max:200'],
           'image_title_az' => ['nullable','max:200'],
            'image_title_en' => ['nullable','max:200'],
            'image_title_ru' => ['nullable','max:200'],
            'image' => ['image'],
            'url' => ['nullable', 'url'],
            'phone_number' => ['nullable', 'max:200'],
            'country_az' => ['nullable','max:200'],
            'country_en' => ['nullable','max:200'],
            'country_ru' => ['nullable','max:200'],
            'vp_url' => ['nullable','url'],
          ]);
          $imagePath = handleUpload('image');
          $brend = Brend::findOrFail($id);
          $brend->image = (!empty($imagePath) ? $imagePath : $brend->image);
          $brend->name_az = $request->name_az;
          $brend->name_en = $request->name_en;
          $brend->name_ru = $request->name_ru;
          $brend->slug_az = Str::slug($request->name_az);
          $brend->slug_en = Str::slug($request->name_en);
          $brend->slug_ru = Str::slug($request->name_ru);
          $brend->alt_image_az = $request->alt_image_az;
          $brend->alt_image_en = $request->alt_image_en;
          $brend->alt_image_ru = $request->alt_image_ru;
          $brend->image_title_az = $request->image_title_az;
          $brend->image_title_en = $request->image_title_en;
          $brend->image_title_ru = $request->image_title_ru;
          $brend->url = $request->url;
          $brend->phone_number = $request->phone_number;
          $brend->country_az = $request->country_az;
          $brend->country_en = $request->country_en;
          $brend->country_ru = $request->country_ru;
            $brend->vp_url = $request->vp_url;
          $brend->save();
          toastr()->success('Uğurla update olundu');
        return redirect()->route('backend.brend.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brend = Brend::findOrFail($id);
        deleteFileIfExist($brend->image);
        $brend->delete();
        return redirect()->route('backend.brend.index')->with('success', 'Uğurla silindi!');
    }
}
