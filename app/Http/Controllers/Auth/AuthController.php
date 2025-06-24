<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('backend.dashboard');
        }
        else{
            return view('backend.auth.login');
        }
    }
    public function postLogin(Request $request){
        if(Auth::check()){
            return view('backend.dashboard');
        }
        else{
            $request->validate([
                'email' => 'required|email|max:65',
                'password' => [
                    'required',
                    'min:6'
                ]
            ]);
            $credentials = $request->only('email','password');
            if(Auth::attempt($credentials)){
                return redirect()->route('dashboard')->withSuccess('You are logged in!');
            }
            return redirect()->route('login')->with('error','incorrect email or password');
        }
    }
    public function dashboard(){
        if(Auth::check()){
            return view('backend.dashboard');
        }
        return redirect()->route('login')->withErrors('You do not have access');
    }
    public function logout(){
        Auth::logout();
        FacadesSession::flush();
        return redirect()->route('login')->with('success','You have been logged out');

    }
    public function updatePassword(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'current_password' => ['required', 'min:6'],
        'password' => ['required', 'min:6', 'confirmed'],
    ]);
    if ($validator->fails()) {
        return back()->withErrors($validator->errors(), 'updatePassword')
                     ->withInput();
    }

    if (!Hash::check($request->current_password, Auth::user()->password)) {
        return back()->withErrors(['current_password' => 'Cari şifrə yanlışdır.'], 'updatePassword');
    }
    $user = Auth::user();
    $user->password = Hash::make($request->password);
    $user->save();
    return back()->with('status', 'Şifrə uğurla yeniləndi.');
    }
}
