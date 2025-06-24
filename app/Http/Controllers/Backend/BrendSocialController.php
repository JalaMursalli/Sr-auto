<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BrendSocial;
use Illuminate\Http\Request;

class BrendSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $brend_id = $request->get('brend_id');
        $socials =BrendSocial::when($search, function ($query, $search) {
            return $query->where('url', 'like', "%{$search}%");
        })->where('brend_id',$brend_id)->paginate(10);

        return view('backend.brend-social.index', compact('search', 'socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $social = new BrendSocial();
        return view('backend.brend-social.create',compact('social'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'brend_id'=>['nullable','integer','exists:brends,id'],
            'icon' => ['nullable','image'],
            'url' => ['nullable','url']
        ]);
        $iconPath = handleUpload('icon');
        $social = new BrendSocial();
        $social->brend_id = $request->brend_id;
        $social->icon = $iconPath;
        $social->url = $request->url;
        $social->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.brend-social.index',['brend_id' => $request->brend_id]);
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
        $social = BrendSocial::findOrFail($id);
        return view('backend.brend-social.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'icon' => ['nullable','image'],
            'url' => ['nullable','url']
        ]);
        $iconPath = handleUpload('icon');
        $social =  BrendSocial::findOrFail($id);
        $social->icon = (!empty($iconPath)? $iconPath : $social->icon ) ;
        $social->url = $request->url;
        $social->save();
        toastr()->success('Uğurla yeniləndi');
        return redirect()->route('backend.brend-social.index',['brend_id' => $request->brend_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $social = BrendSocial::findOrFail($id);
        deleteFileIfExist(filePath: $social->icon);
        $social->delete();
        return redirect()->route('backend.brend-social.index')->with('success', 'Uğurla silindi!');
    }
}
