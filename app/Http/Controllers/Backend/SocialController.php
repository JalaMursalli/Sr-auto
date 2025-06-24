<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $socials = Social::when($search, function ($query, $search) {
            return $query->where('url', 'like', "%{$search}%");
        })->paginate(10);

        return view('backend.social.index', compact('search', 'socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $social = new Social();
        return view('backend.social.create',compact('social'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required','image'],
            'url' => ['required', 'url']
        ]);
        $iconPath = handleUpload('icon');
        $social = new Social();
        $social->icon = $iconPath;
        $social->url = $request->url;
        $social->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.social.index');
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
        $social = Social::findOrFail($id);
        return view('backend.social.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['image'],
            'url' => ['required', 'url']
        ]);
        $iconPath = handleUpload('icon');
        $social = Social::findOrFail($id);
        $social->icon = (!empty($iconPath)? $iconPath : $social->icon ) ;
        $social->url = $request->url;
        $social->save();
        toastr()->success('Uğurla yeniləndi');
        return redirect()->route('backend.social.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $social = Social::findOrFail($id);
        deleteFileIfExist(filePath: $social->icon);
        $social->delete();
        return redirect()->route('backend.social.index')->with('success', 'Uğurla silindi!');
        
    }
}
