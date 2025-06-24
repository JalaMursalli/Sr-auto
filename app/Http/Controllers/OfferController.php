<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product_id = $request->get('product_id');
        $offer = Offer::where('product_id', $product_id)->first();
        return response([
            'status' => 'success',
            'data' => [
                'status' => $offer?->status ? true : false,
                'date' => $offer?->date?->format('Y-m-d'),
            ]
        ]);
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
        $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'date' => ['required', 'date'],
        ]);
        $offer = Offer::where('product_id', $request->get('product_id'))->first();
        if (is_null($offer)) {
            $offer = new Offer;
        }
        $offer->product_id = $request->get('product_id');
        $offer->date = $request->get('date');
        $offer->save();
        toastr()->success('Uğurla yeniləndi', 'success');
        return redirect()->back();
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
        // $request->validate([
        //     'product_id' => ['required', 'integer', 'exists:products,id'],
        //     'date' => ['required', 'date'],
        // ]);
        // $offer = Offer::first();
        // Offer::updateOrCreate(
        //     ['id' => $id],
        //     [
        //         'date' => $request->date,
        //     ]
        // );
        // toastr()->success('Uğurla yeniləndi', 'success');
        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $product_id = $request->get('product_id');
        $offer = Offer::where('product_id', $product_id)->first();
        if (is_null($offer)) return response([
            'status' => 'error',
            'message' => 'Offer not found',
        ]);
        $offer->delete();
        return response([
            'status' => 'success',
            'message' => 'Offer has been deleted',
        ]);
    }
    public function changeStatus(Request $request)
    {
        $offer = Offer::findOrFail($request->id);
        $offer->status = $request->status == 'true' ? 1 : 0;
        $offer->save();

        return response(['message' => 'Status has been updated']);
    }
}
