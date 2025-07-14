<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brend;
use App\Models\Feature;
use App\Models\FeatureGroup;
use App\Models\Fuel;
use App\Models\Model;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Product::when($search, function ($query, $search) {
            return $query->where('name_az', 'like', "%{$search}%")
                ->orWhere('name_en', 'like', "%{$search}%")
                ->orWhere('name_ru', 'like', "%{$search}%");
            ;

        })->paginate(10);

        $fuels = Product::all();
        return view('backend.product.index', compact('search', 'products', 'fuels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $brends = Brend::all();
        $models = Model::all();
        $fuels = Fuel::all();
        $status_s = Status::all();
        $featureGroups = FeatureGroup::get();

        return view('backend.product.create', compact('product', 'featureGroups', 'brends', 'models', 'fuels', 'status_s'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_az' => ['required', 'max:200'],
            'name_en' => ['required', 'max:200'],
            'name_ru' => ['required', 'max:200'],
            'image' => ['required', 'image'],
            'power_and_speed_az' => ['nullable'],
            'power_and_speed_en' => ['nullable'],
            'power_and_speed_ru' => ['nullable'],
            'battery_and_charge_az' => ['nullable'],
            'battery_and_charge_en' => ['nullable'],
            'battery_and_charge_ru' => ['nullable'],
            'size_az' => ['nullable'],
            'size_en' => ['nullable'],
            'size_ru' => ['nullable'],
            'features_az' => ['nullable'],
            'features_en' => ['nullable'],
            'features_ru' => ['nullable'],
            'price' => ['nullable'],
            'engine_volume' => ['nullable'],
            'year' => ['nullable', 'numeric'],
            'expence' => ['nullable'],
            'horse_power' => ['nullable'],
            'acceleration' => ['nullable'],
            'battery' => ['nullable'],
            'charge' => ['nullable'],
            'max_distance' => ['nullable'],
            'sale_status' => ['required'],
            'meta_title_az' => ['nullable', 'max:200'],
            'meta_title_en' => ['nullable', 'max:200'],
            'meta_title_ru' => ['nullable', 'max:200'],
            'meta_description_az' => ['nullable'],
            'meta_description_en' => ['nullable'],
            'meta_description_ru' => ['nullable'],
            'description_az' => ['nullable'],
            'description_en' => ['nullable'],
            'description_ru' => ['nullable'],
            'alt_image_az' => ['nullable', 'max:200'],
            'alt_image_en' => ['nullable', 'max:200'],
            'alt_image_ru' => ['nullable', 'max:200'],
            'image_title_az' => ['nullable', 'max:200'],
            'image_title_en' => ['nullable', 'max:200'],
            'image_title_ru' => ['nullable', 'max:200'],
            'brend_id' => ['required', 'integer', 'exists:brends,id'],
            'model_id' => ['required', 'integer', 'exists:models,id'],
            'fuel_id' => ['required', 'integer', 'exists:fuels,id'],
            'status_id' => ['required','integer', 'exists:statuses,id'],
            'guarantee_az' => ['nullable'],
            'guarantee_en' => ['nullable'],
            'guarantee_ru' => ['nullable'],
            'all_features' => ['mimes:pdf,csv,txt','max:10000'],
        ]);


        $imagePath = handleUpload('image');
        $featurePath = handleUpload('all_features');
        $product = new Product();
        $product->name_az = $request->name_az;
        $product->name_en = $request->name_en;
        $product->name_ru = $request->name_ru;
        $product->slug_az = $this->generate_slug($request->name_az, 'az');
        $product->slug_en = $this->generate_slug($request->name_en, 'en');
        $product->slug_ru = $this->generate_slug($request->name_ru, 'ru');
        $product->meta_title_az = $request->meta_title_az;
        $product->meta_title_en = $request->meta_title_en;
        $product->meta_title_ru = $request->meta_title_ru;
        $product->meta_description_az = $request->meta_description_az;
        $product->meta_description_en = $request->meta_description_en;
        $product->meta_description_ru = $request->meta_description_ru;
        $product->description_az = $request->description_az;
        $product->description_en = $request->description_en;
        $product->description_ru = $request->description_ru;
        $product->alt_image_az = $request->alt_image_az;
        $product->alt_image_en = $request->alt_image_en;
        $product->alt_image_ru = $request->alt_image_ru;
        $product->image_title_az = $request->image_title_az;
        $product->image_title_en = $request->image_title_en;
        $product->image_title_ru = $request->image_title_ru;
        $product->image = $imagePath;
        $product->all_features = $featurePath;
        $product->power_and_speed_az = $request->power_and_speed_az;
        $product->power_and_speed_en = $request->power_and_speed_en;
        $product->power_and_speed_ru = $request->power_and_speed_ru;
        $product->battery_and_charge_az = $request->battery_and_charge_az;
        $product->battery_and_charge_en = $request->battery_and_charge_en;
        $product->battery_and_charge_ru = $request->battery_and_charge_ru;
        $product->size_az = $request->size_az;
        $product->size_en = $request->size_en;
        $product->size_ru = $request->size_ru;
        $product->features_az = $request->features_az;
        $product->features_en = $request->features_en;
        $product->features_ru = $request->features_ru;
        $product->price = $request->price;
        $product->year = $request->year;
        $product->engine_volume = $request->engine_volume;
        $product->expence = $request->expence;
        $product->horse_power = $request->horse_power;
        $product->acceleration = $request->acceleration;
        $product->battery = $request->battery;
        $product->charge = $request->charge;
        $product->max_distance = $request->max_distance;
        $product->sale_status = $request->sale_status;
        $product->brend_id = $request->brend_id;
        $product->model_id = $request->model_id;
        $product->fuel_id = $request->fuel_id;
        $product->status_id = $request->status_id;
        $product->battery_number = $request->battery_number;
        $product->horse_number = $request->horse_number;
        $product->acceleration_number = $request->acceleration_number;
        $product->milage_number = $request->milage_number;
        $product->expenses_number = $request->expenses_number;
        $product->engine_number = $request->engine_number;
        $product->guarantee_az = $request->guarantee_az;
        $product->guarantee_en = $request->guarantee_en;
        $product->guarantee_ru = $request->guarantee_ru;
        $product->save();


        if ($request->has('features')) {
            $featureIds = [];

            foreach ($request->features as $featureData) {
                $feature = Feature::updateOrCreate(
                    [
                        'feature_group_id' => $featureData['group_id'],
                        'key_az' => $featureData['key_az'],
                        'key_en' => $featureData['key_en'],
                        'key_ru' => $featureData['key_ru']
                    ],
                    [
                        'value_az' => $featureData['value_az'],
                        'value_en' => $featureData['value_en'],
                        'value_ru' => $featureData['value_ru']
                    ]
                );

                $featureIds[] = $feature->id;
            }

            $product->features()->sync($featureIds);
        } else {
            $product->features()->detach();
        }

        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.product.index');
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
        $product = Product::findOrFail($id);
        $brends = Brend::all();
        $models = Model::all();
        $fuels = Fuel::all();
        $status_s = Status::all();
        $featureGroups = FeatureGroup::get();
        return view('backend.product.edit', compact('product', 'brends', 'models', 'fuels', 'featureGroups', 'status_s'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_az' => ['required', 'max:200'],
            'name_en' => ['required', 'max:200'],
            'name_ru' => ['required', 'max:200'],
            'image' => ['nullable', 'image'],
            'power_and_speed_az' => ['nullable'],
            'power_and_speed_en' => ['nullable'],
            'power_and_speed_ru' => ['nullable'],
            'battery_and_charge_az' => ['nullable'],
            'battery_and_charge_en' => ['nullable'],
            'battery_and_charge_ru' => ['nullable'],
            'size_az' => ['nullable'],
            'size_en' => ['nullable'],
            'size_ru' => ['nullable'],
            'features_az' => ['nullable'],
            'features_en' => ['nullable'],
            'features_ru' => ['nullable'],
            'price' => ['nullable'],
            'year' => ['nullable', 'numeric'],
            'engine_volume' => ['nullable'],
            'expence' => ['nullable'],
            'horse_power' => ['nullable'],
            'acceleration' => ['nullable'],
            'battery' => ['nullable'],
            'charge' => ['nullable'],
            'max_distance' => ['nullable'],
            'sale_status' => ['required'],
            'meta_title_az' => ['nullable', 'max:200'],
            'meta_title_en' => ['nullable', 'max:200'],
            'meta_title_ru' => ['nullable', 'max:200'],
            'meta_description_az' => ['nullable'],
            'meta_description_en' => ['nullable'],
            'meta_description_ru' => ['nullable'],
            'description_az' => ['nullable'],
            'description_en' => ['nullable'],
            'description_ru' => ['nullable'],
            'alt_image_az' => ['nullable', 'max:200'],
            'alt_image_en' => ['nullable', 'max:200'],
            'alt_image_ru' => ['nullable', 'max:200'],
            'image_title_az' => ['nullable', 'max:200'],
            'image_title_en' => ['nullable', 'max:200'],
            'image_title_ru' => ['nullable', 'max:200'],
            'brend_id' => ['required', 'integer', 'exists:brends,id'],
            'model_id' => ['required', 'integer', 'exists:models,id'],
            'fuel_id' => ['required', 'integer', 'exists:fuels,id'],
            'status_id' => ['integer', 'exists:statuses,id'],
            'guarantee_az' => ['nullable'],
            'guarantee_en' => ['nullable'],
            'guarantee_ru' => ['nullable'],
            'all_features' => ['mimes:pdf,csv,txt','max:10000'],
        ]);
        $imagePath = handleUpload('image');
        $featurePath = handleUpload('all_features');
        $product = Product::findOrFail($id);
        $product->name_az = $request->name_az;
        $product->name_en = $request->name_en;
        $product->name_ru = $request->name_ru;
        $product->slug_az = $this->generate_slug($request->name_az, 'az', $product);
        $product->slug_en = $this->generate_slug($request->name_en, 'en', $product);
        $product->slug_ru = $this->generate_slug($request->name_ru, 'ru', $product);
        $product->meta_title_az = $request->meta_title_az;
        $product->meta_title_en = $request->meta_title_en;
        $product->meta_title_ru = $request->meta_title_ru;
        $product->meta_description_az = $request->meta_description_az;
        $product->meta_description_en = $request->meta_description_en;
        $product->meta_description_ru = $request->meta_description_ru;
        $product->description_az = $request->description_az;
        $product->description_en = $request->description_en;
        $product->description_ru = $request->description_ru;
        $product->alt_image_az = $request->alt_image_az;
        $product->alt_image_en = $request->alt_image_en;
        $product->alt_image_ru = $request->alt_image_ru;
        $product->image_title_az = $request->image_title_az;
        $product->image_title_en = $request->image_title_en;
        $product->image_title_ru = $request->image_title_ru;
        $product->image = (!empty($imagePath) ? $imagePath : $product->image);
        $product->all_features = (!empty($featurePath) ? $featurePath : $product->all_features);
        $product->power_and_speed_az = $request->power_and_speed_az;
        $product->power_and_speed_en = $request->power_and_speed_en;
        $product->power_and_speed_ru = $request->power_and_speed_ru;
        $product->battery_and_charge_az = $request->battery_and_charge_az;
        $product->battery_and_charge_en = $request->battery_and_charge_en;
        $product->battery_and_charge_ru = $request->battery_and_charge_ru;
        $product->size_az = $request->size_az;
        $product->size_en = $request->size_en;
        $product->size_ru = $request->size_ru;
        $product->features_az = $request->features_az;
        $product->features_en = $request->features_en;
        $product->features_ru = $request->features_ru;
        $product->price = $request->price;
        $product->year = $request->year;
        $product->engine_volume = $request->engine_volume;
        $product->expence = $request->expence;
        $product->horse_power = $request->horse_power;
        $product->acceleration = $request->acceleration;
        $product->battery = $request->battery;
        $product->charge = $request->charge;
        $product->max_distance = $request->max_distance;
        $product->sale_status = $request->sale_status;
        $product->brend_id = $request->brend_id;
        $product->model_id = $request->model_id;
        $product->fuel_id = $request->fuel_id;
        $product->status_id = $request->status_id;
        $product->battery_number = $request->battery_number;
        $product->horse_number = $request->horse_number;
        $product->acceleration_number = $request->acceleration_number;
        $product->milage_number = $request->milage_number;
        $product->expenses_number = $request->expenses_number;
        $product->engine_number = $request->engine_number;
        $product->guarantee_az = $request->guarantee_az;
        $product->guarantee_en = $request->guarantee_en;
        $product->guarantee_ru = $request->guarantee_ru;


        if ($request->has('features')) {
            $featureIds = [];

            foreach ($request->features as $featureData) {
                $feature = Feature::updateOrCreate(
                    [
                        'feature_group_id' => $featureData['group_id'],
                        'key_az' => $featureData['key_az'],
                        'key_en' => $featureData['key_en'],
                        'key_ru' => $featureData['key_ru']
                    ],
                    [
                        'value_az' => $featureData['value_az'],
                        'value_en' => $featureData['value_en'],
                        'value_ru' => $featureData['value_ru']
                    ]
                );

                $featureIds[] = $feature->id;
            }

            $product->features()->sync($featureIds);
        } else {
            $product->features()->detach();
        }
        $product->save();
        toastr()->success('Uğurla update olundu');
        return redirect()->route('backend.product.index');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        deleteFileIfExist($product->image);
        $product->features()->sync([]);
        $product->delete();
        return redirect()->route('backend.product.index')->with('success', 'Uğurla silindi!');
    }

    private function generate_slug(string $title, string $lang, Product $model = null): string
    {
        if (is_null($model)) {
            $product_count = count(Product::where('name_' . $lang, $title)->get());
        } else {
            $product_count = count(Product::where('name_' . $lang, $title)
                ->where('id', '!=', $model->id)
                ->get());
        }
        if ($product_count > 0)
            $slug = str()->slug($title) . '-' . ($product_count + 1);
        else
            $slug = str()->slug($title);
        return $slug;
    }
}
