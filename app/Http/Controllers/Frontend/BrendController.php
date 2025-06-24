<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brend;
use App\Models\Fuel;
use App\Models\Model;
use App\Models\Offer;
use App\Models\Product;
use App\Models\ProductIcon;
use App\Models\ProductImage;
use App\Models\Social;
use App\Models\SocialShare;
use App\Models\Status;
use App\Models\TestDrive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrendController extends Controller
{
    public function index(Request $request,)
    {
        $request->validate([
            // 'brend_id' => ['required', 'exists:brends,id'],
        ]);
        $brend_id = $request->get('brend_id');
        $model_id = $request->get('model_id');
        $fuel_id = $request->get('fuel_id');
        $status = $request->get('status');
        $min_price = $request->get('min_price');
        $max_price = $request->get('max_price');
        $query = Product::query();
        $models = Model::query();
        $brends = Brend::all();
        $fuels = Fuel::all();
        $statuses = Status::all();
        $brend = null;


        $offers = [];
        if ($request->brend_id) {
            $brend = Brend::find($request->brend_id);
            $product_ids = Product::where('brend_id',$brend_id)->pluck('id')->toArray();
            $offers = Offer::whereIn('product_id',$product_ids)->get();
            $query->where('brend_id', $brend_id);
        }

        if (!empty($model_id)) {

            $query->where('model_id', $model_id);
        }

        if (!empty($fuel_id)) {

            $query->where('fuel_id', $fuel_id);
        }



        if ($min_price > 0) {

            $query->where('price', '>', $min_price);
        }

        if ($max_price > 0) {

            $query->where('price', '<', $max_price);
        }

        if($request->fuelt_type){
            $query->whereIn('fuel_id', $request->fuelt_type);
        }

        if($request->filled('status') && is_array($request->status) && count(array_filter($request->status))){

            $query->whereIn('status_id', $request->status);
        }



        if($request->battery_min and $request->battery_min!=0){
            $query->where('battery_number','>', $request->battery_min);
        }

        if($request->battery_max and $request->battery_max!=0){
            $query->where('battery_number', '<', $request->battery_max);
        }


        if ($request->acceleration_max && $request->acceleration_max != 0) {
            $query->where('acceleration_number', '<=', $request->acceleration_max);
        }



        if ($request->horse_min && $request->horse_min != 0) {
            $query->where('horse_number', '>=', $request->horse_min);
        }

        if ($request->horse_max && $request->horse_max != 0) {
            $query->where('horse_number', '<=', $request->horse_max);
        }

        if ($request->acceleration_min && $request->acceleration_min != 0) {
            $query->where('acceleration_number', '>=', $request->acceleration_min);
        }

        if ($request->acceleration_max && $request->acceleration_max != 0) {
            $query->where('acceleration_number', '<=', $request->acceleration_max);
        }


        if ($request->mileage_number_min && $request->mileage_number_min != 0) {
            $query->where('milage_number', '>=', $request->mileage_number_min);
        }

        if ($request->mileage_number_max && $request->mileage_number_max != 0) {
            $query->where('milage_number', '<=', $request->mileage_number_max);
        }


        if ($request->expenses_min && $request->expenses_min != 0) {
            $query->where('expenses_number', '>=', $request->expenses_min);
        }

        if ($request->expenses_max && $request->expenses_max != 0) {
            $query->where('expenses_number', '<=', $request->expenses_max);
        }

        if ($request->engine_min && $request->engine_min != 0) {
            $query->where('engine_number', '>=', $request->engine_min);
        }

        if ($request->engine_max && $request->engine_max != 0) {
            $query->where('engine_number', '<=', $request->engine_max);
        }
        $name = "name_".app()->getLocale();

        if ($request->filled('query')) {
            $query->whereHas("brend", function($qq) use($request) {
                $name = "name_".app()->getLocale();
                return $qq->where($name, 'like', '%' . $request->query('query') . '%');
            })->orWhereHas("model", function($qq) use($request) {
                $name = "name_".app()->getLocale();
                return $qq->where($name, 'like', '%' . $request->query('query') . '%');
            })->orWhere($name, 'like','%'.$request->query('query').'%');
        }



        if($request->filled('brend_id')){
            $models = $models->where('brend_id', $request->brend_id);
        }
        $models = $models->get();
        $products = $query->paginate(24);
        return view('frontend.brend.index', compact(
            'models',
            'products',
            'brends',
            'fuels',
            'brend',
            'offers',
            'statuses'
        ));
    }
    public function showProduct(Request $request,$language, $slug)
    {
        $models = Model::get();
        $productDetail = Product::with('brend')->where("slug_" . app()->getLocale(), $slug)->firstOrFail();
        $brend = Brend::find($productDetail->brend_id);
        $products =  Product::where('id', '!=', $productDetail->id)
    ->whereHas('fuel', function ($query) use ($productDetail) {
        $query->where('fuel_id', $productDetail->fuel_id);
    })
    ->get();
        $shares = SocialShare::all();
        return view('frontend.product.product-detail', compact(
            'productDetail',
            'products',
            'brend',
            'shares',
            "models",


        ));
    }


    public function testDrive(Request $request)
    {
            $validated = $request->validate([
                    'name' => ['required', 'max:200'],
                    'surname' => ['required', 'max:200'],
                    'phone' => ['required', 'max:20'],
                    'brend_id' => ['required'],
                    'model_id' => ['required'],

            ],[
                "name.required"=>__('frontend.name_required'),
                "name.max"=>__('frontend.name_max'),
                "surname.required"=>__('frontend.surname_required'),
                "surname.max"=>__('frontend.surname_max'),
                "phone.required"=>__('frontend.phone_required'),
                'phone.max'    => __('frontend.phone_max'),
                'brend_id.required'  => __('frontend.brend_id_required'),
                'model_id.required'  => __('frontend.model_id_required'),
            ]);

            TestDrive::create($request->except('_token'));
            return response()->json([
                    'message'=>'Müraciətiniz təsdiq olundu!'
            ]);
    }


}
