<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SocialShare;
use Illuminate\Http\Request;

class SocialShareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $shares = SocialShare::when($search, function ($query, $search) {
            return $query->where('url', 'like', "%{$search}%");
        })->paginate(10);

        return view('backend.share.index', compact('search', 'shares'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $share = new SocialShare();
        return view('backend.share.create',compact('share'));
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
        $share = new SocialShare();
        $share->icon = $iconPath;
        $share->url = $request->url;
        $share->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.share.index');
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
        $share = SocialShare::findOrFail($id);
        return view('backend.share.edit',compact('share'));
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
        $share = SocialShare::findOrFail($id);
        $share->icon = (!empty($iconPath)? $iconPath : $share->icon ) ;
        $share->url = $request->url;
        $share->save();
        toastr()->success('Uğurla yeniləndi');
        return redirect()->route('backend.share.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $share = SocialShare::findOrFail($id);
        deleteFileIfExist(filePath: $share->icon);
        $share->delete();
        return redirect()->route('backend.share.index')->with('success', 'Uğurla silindi!');
    }
}
