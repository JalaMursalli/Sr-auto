<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Model;
use App\Models\Success;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function index(){
         $models = Model::all();
         $success = Success::first();
        return view('frontend.success.index',compact(
            'models',
            'success'
        ));
    }

}
