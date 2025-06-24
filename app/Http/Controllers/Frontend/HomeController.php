<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brend;
use App\Models\Fuel;
use App\Models\Home;
use App\Models\Logo;
use App\Models\Model;
use App\Models\Price;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $models = collect();
        $fuels = Fuel::all();
        $logo = Logo::first();
        $prices = collect();
        $home = Home::first();
        $brends = Brend::all();
        return view('frontend.home.index', compact(
            'models',
            'fuels',
            'logo',
            'prices',
            'home',
            'brends'
        ));
    }

    public function get_price_interval(int $id)
    {
        $price = Price::find($id);
        if (is_null($price)) {
            return response([
                'status' => 'error',
                'message' => 'Data not found',
            ]);
        }
        return response([
            'status' => 'success',
            'min_price' => $price->min_price,
            'max_price' => $price->max_price,
        ]);
    }
    public function getModels($brend_id)
    {
        $models = Model::where('brend_id', $brend_id)->get();
        return response()->json($models);
    }

    public function getFuels($model_id)
    {
        $model = Model::findOrFail($model_id);
        $fuels = $model->fuels;
        return response()->json($fuels);
    }

    public function getPriceInterval($brend_id)
    {
        $prices = Price::where('brend_id', $brend_id)->get();
        return response()->json($prices);
    }
}
