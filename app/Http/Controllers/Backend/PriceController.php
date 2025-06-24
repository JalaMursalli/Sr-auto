<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brend;
use App\Models\Model;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prices = Price::paginate(10);
        return view('backend.price.index', compact('prices'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $price = new Price();
        $brends = Brend::orderBy('created_at', 'desc')->get();
        return view('backend.price.create', compact('price', 'brends'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'min_price' => ['nullable', 'numeric'],
            'max_price' => ['nullable', 'numeric'],
            'brend_id' => ['required', 'integer', 'exists:brends,id'],
        ]);
        $price = new Price();
        $price->min_price = $request->min_price;
        $price->max_price = $request->max_price;
        $price->brend_id = $request->brend_id;
        $price->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.price.index');
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
        $price = Price::findOrFail($id);
        $brends = Brend::orderBy('created_at', 'desc')->get();
        return view('backend.price.edit', compact('price', 'brends'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'min_price' => ['nullable', 'numeric'],
            'max_price' => ['nullable', 'numeric'],
            'brend_id' => ['required', 'integer', 'exists:brends,id'],
        ]);
        $price = Price::findOrFail($id);
        $price->min_price = $request->min_price;
        $price->max_price = $request->max_price;
        $price->brend_id = $request->brend_id;
        $price->save();
        toastr()->success('Uğurla update olundu');
        return redirect()->route('backend.price.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $price = Price::findOrFail($id);
        $price->delete();
        return redirect()->route('backend.price.index')->with('success', 'Uğurla silindi!');
    }
}
