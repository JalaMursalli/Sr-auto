<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BrendSocial;
use App\Models\ContactApply;
use App\Models\ContactInfo;
use App\Models\ContactUs;
use App\Models\Model;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        $contacts = ContactUs::all();
        $contact_info = ContactInfo::first();
        $models = Model::all();
        return view('frontend.contact-us.index', compact(
            'models',
            'contact_info',
            'contacts',
        ));
    }
    public function apply(Request $request)
    {

       $validated = $request->validate([
            'name' => ['required', 'max:200'],
            'surname' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'application_type' => ['required'],
            'text' => ['required', 'max:5000'],
        ],[
            "name.required"=>__('frontend.name_required'),
            "name.max"=>__('frontend.name_max'),
            "surname.required"=>__('frontend.surname_required'),
            "surname.max"=>__('frontend.surname_max'),
            "email.required"=>__('frontend.email_required'),
            "email.email"=>__('frontend.email_demand'),
            "application_type.required"=>__('frontend.application_type_required'),
            "text.required"=>__('frontend.text_required'),
            "text.max"=>__('frontend.phone_max'),

        ]);
        $application = new ContactApply();
        $application->name = $request->name;
        $application->surname = $request->surname;
        $application->email = $request->email;
        $application->application_type = $request->application_type;
        $application->text = $request->text;
        $application->save();
        return response()->json([
            'message'=>'Müraciətiniz təsdiq olundu!'
        ]);
    }
}
