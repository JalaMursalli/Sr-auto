<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function edit(Request $request){
        return view('backend.profile.profile',[
            'user' => $request->user()
        ]);
    }
    public function update(Request $request){
        $request->user()->fill($request->validated());
        if($request->user()->isDirty('email')){
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();
        toastr()->success('Profil Uğurla Yeniləndi!');
        return Redirect::route('profile.edit')->with('status','profile-updated');
    }

}
