<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductIcon;
use Illuminate\Http\Request;

class ProductIconController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');
        $product_id = $request->get('product_id');
        $product_icons = ProductIcon::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");

        })->where('product_id',$product_id)->paginate(10);
        return view('backend.product-icon.index', compact('search', 'product_icons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_icon = new ProductIcon();
        return view('backend.product-icon.create', compact('product_icon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
        'product_id'=>['required','integer','exists:products,id'],
        'title_az' => ['required','max:200'],
        'title_en' => ['required','max:200'],
        'title_ru' => ['required','max:200'],
        'value' =>['required'],
        'icon' => ['required','image'],

        ]);
        $iconPath = handleUpload('icon');
        $product_icon = new ProductIcon();
        $product_icon->product_id = $request->product_id;
        $product_icon->icon = $iconPath;
        $product_icon->title_az = $request->title_az;
        $product_icon->title_en = $request->title_en;
        $product_icon->title_ru = $request->title_ru;
        $product_icon->value = $request->value;
        $product_icon->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.product-icon.index',['product_id'=>$request->product_id]);
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
        $product_icon = ProductIcon::findOrFail($id);
        return view('backend.product-icon.edit',compact('product_icon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_id'=>['required','integer','exists:products,id'],
            'title_az' => ['required','max:200'],
            'title_en' => ['required','max:200'],
            'title_ru' => ['required','max:200'],
            'value' => ['required'],
            'icon' => ['nullable','image'],

            ]);
            $iconPath = handleUpload('icon');
            $product_icon =ProductIcon::findOrFail($id);
            $product_icon->product_id = $request->product_id;
            $product_icon->icon =  (!empty($iconPath)? $iconPath : $product_icon->icon ) ;
            $product_icon->title_az = $request->title_az;
            $product_icon->title_en = $request->title_en;
            $product_icon->title_ru = $request->title_ru;
            $product_icon->value = $request->value;
            $product_icon->save();
            toastr()->success('Uğurla yaradıldı');
            return redirect()->route('backend.product-icon.index',['product_id'=>$request->product_id]);
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product_icon =ProductIcon::findOrFail($id);
        deleteFileIfExist(filePath: $product_icon->icon);
        $product_icon->delete();
        return redirect()->route('backend.product-icon.index')->with('success', 'Uğurla silindi!');
    }
}
