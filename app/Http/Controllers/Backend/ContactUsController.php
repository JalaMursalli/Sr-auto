<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $contact = ContactUs::where('brend_id',$request->brend_id)->first();

        if(is_null($contact)){
            $contact = ContactUs::create([
                'brend_id'=>$request->brend_id
            ]);
        }


        return view('backend.contact-us.index',compact('contact'));
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
            'sale_address_az' => ['nullable', 'max:200'],
            'sale_address_en' => ['nullable', 'max:200'],
            'sale_address_ru' => ['nullable', 'max:200'],
            'sale_contact_number1' => ['nullable','max:200'],
            'sale_contact_number2' => ['nullable','max:200'],
            'sale_contact_number3' => ['nullable','max:200'],
            'sale_email' => ['nullable','max:200'],
            'service_address_az' => ['nullable','max:200'],
            'service_address_en' => ['nullable','max:200'],
            'service_address_ru' => ['nullable','max:200'],
            'service_contact_number1' => ['nullable','max:200'],
            'service_contact_number2' => ['nullable','max:200'],
            'service_contact_number3' => ['nullable','max:200'],
            'service_email' => ['nullable','max:200'],
            'waze_url' => ['nullable','url'],
            'brend_id'=>['required','integer','exists:brends,id'],
        ]);

        $contact = ContactUs::findOrFail($id);
        ContactUs::updateOrCreate(
            ['id' => $id],
            [
                'sale_address_az' => $request->sale_address_az,
                'sale_address_en' => $request->sale_address_en,
                'sale_address_ru' => $request->sale_address_ru,
                'sale_contact_number1' => $request->sale_contact_number1,
                'sale_contact_number2' => $request->sale_contact_number2,
                'sale_contact_number3' => $request->sale_contact_number3,
                'sale_email' => $request->sale_email,
                'service_address_az' => $request->service_address_az,
                'service_address_en' => $request->service_address_en,
                'service_address_ru' => $request->service_address_ru,
                'service_contact_number1' => $request->service_contact_number1,
                'service_contact_number2' => $request->service_contact_number2,
                'service_contact_number3' => $request->service_contact_number3,
                'service_email' => $request->service_email,
                'waze_url' => $request->waze_url,
                'brend_id' => $request->brend_id,
            ]
        );
        $contact->save();
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
