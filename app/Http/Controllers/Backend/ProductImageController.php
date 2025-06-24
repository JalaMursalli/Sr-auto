<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product_id = $request->get('product_id');
        $product_images = ProductImage::where('product_id',$product_id)->paginate(10);
        return view('backend.product-image.index', compact('product_images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_image = new ProductImage();
        return view('backend.product-image.create', compact('product_image'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id'=>['required','integer','exists:products,id'],
            'image' => ['required','image'],

            ]);
            $imagePath = handleUpload('image');
            $product_image = new ProductImage();
            $product_image->product_id = $request->product_id;
            $product_image->image = $imagePath;
            $product_image->save();
            toastr()->success('Uğurla yaradıldı');
            return redirect()->route('backend.product-image.index',['product_id'=>$request->product_id]);
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
        $product_image = ProductImage::findOrFail($id);
        return view('backend.product-image.edit',compact('product_image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_id'=>['required','integer','exists:products,id'],
            'image' => ['nullable','image'],

            ]);
            $imagePath = handleUpload('image');
            $product_image =ProductImage::findOrFail($id);
            $product_image->product_id = $request->product_id;
            $product_image->image =  (!empty($imagePath)? $imagePath : $product_image->image ) ;
            $product_image->save();
            toastr()->success('Uğurla yaradıldı');
            return redirect()->route('backend.product-image.index',['product_id'=>$request->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product_image =ProductImage::findOrFail($id);
        deleteFileIfExist(filePath: $product_image->image);
        $product_image->delete();
        return redirect()->route('backend.product-image.index')->with('success', 'Uğurla silindi!');
    }
}
