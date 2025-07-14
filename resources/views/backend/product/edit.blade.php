@extends('backend.layouts.layout')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Yeniləmək</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#az" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">AZ</span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#en" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">EN</span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#ru" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">RU</span>
                                    </a>
                                </li>
                            </ul>
                            <form class="needs-validation" method="POST"
                                action="{{ route('backend.product.update', $product->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Ad
                                                    (Az)</label>
                                                <div class="">
                                                    <input class="form-control" name="name_az" type="text"
                                                        value="{{ $product?->name_az }}" id="example-text-input">
                                                    @error('name_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Zəmanət
                                                    (Az)</label>
                                                <div class="">
                                                    <input class="form-control" name="guarantee_az" type="text"
                                                        value="{{ $product?->guarantee_az }}" id="example-text-input">
                                                    @error('guarantee_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">Meta title
                                                        (Az)</label>
                                                    <div>
                                                        <input class="form-control" name="meta_title_az" type="text"
                                                            value="{{ $product?->meta_title_az }}" id="example-text-input">
                                                        @error('meta_title_az')
                                                            <div class="invalid-feedback" style="display: block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt
                                                    (Az)</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $product?->alt_image_az }}" name="alt_image_az">
                                                @error('alt_image_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Meta Description (Az)
                                                </label>
                                                <div class="">
                                                    <textarea name="meta_description_az" class="form-control">{!! $product->meta_description_az !!}</textarea>
                                                    @error('meta_description_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="image_title_az" class="col-form-label">Img Title (Az)</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $product?->image_title_az }}" name="image_title_az"
                                                    id="image_title_az">
                                                @error('image_title_az')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                            <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Description
                                                (Az)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="description_az" id="description_az" class="summernote">{!! $product->description_az !!}</textarea>
                                                @error('description_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Güc və sürət
                                                (Az)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="power_and_speed_az" class="summernote">{!! $product->power_and_speed_az !!}</textarea>
                                                @error('power_and_speed_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Battery və
                                                Charge (Az)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="battery_and_charge_az" class="summernote">{!! $product->battery_and_charge_az !!}</textarea>
                                                @error('battery_and_charge_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Avtomobilin
                                                ölcüləri (Az)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="size_az" class="summernote">{!! $product->size_az !!}</textarea>
                                                @error('size_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Əlavə
                                                Xüsusiyyətlər (Az)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="features_az" class="summernote">{!! $product->features_az !!}</textarea>
                                                @error('features_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="en">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Ad
                                                    (En)</label>
                                                <div class="">
                                                    <input class="form-control" name="name_en" type="text"
                                                        value="{{ $product?->name_en }}" id="example-text-input">
                                                    @error('name_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Zəmanət
                                                    (En)</label>
                                                <div class="">
                                                    <input class="form-control" name="guarantee_en" type="text"
                                                        value="{{ $product?->guarantee_en }}" id="example-text-input">
                                                    @error('guarantee_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">Meta title
                                                        (En)</label>
                                                    <div>
                                                        <input class="form-control" name="meta_title_en" type="text"
                                                            value="{{ $product?->meta_title_en }}"
                                                            id="example-text-input">
                                                        @error('meta_title_en')
                                                            <div class="invalid-feedback" style="display: block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt
                                                    (En)</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $product?->alt_image_en }}" name="alt_image_en">
                                                @error('alt_image_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Meta
                                                    Description(En) </label>
                                                <div class="">
                                                    <textarea name="meta_description_en" class="form-control">{!! $product->meta_description_en !!}</textarea>
                                                    @error('meta_description_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="image_title_en" class="col-form-label">Img Title (En)</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $product?->image_title_en }}" name="image_title_en"
                                                    id="image_title_en">
                                                @error('image_title_en')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                            <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Description
                                                (En)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="description_en" id="description_en" class="summernote">{!! $product->description_en !!}</textarea>
                                                @error('description_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Güc və sürət
                                                (En)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="power_and_speed_en" class="summernote">{!! $product->power_and_speed_en !!}</textarea>
                                                @error('power_and_speed_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Battery və
                                                Charge (En)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="battery_and_charge_en" class="summernote">{!! $product->battery_and_charge_en !!}</textarea>
                                                @error('battery_and_charge_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Avtomobilin
                                                ölcüləri (En)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="size_en" class="summernote">{!! $product->size_en !!}</textarea>
                                                @error('size_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Əlavə
                                                Xüsusiyyətlər (En)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="features_en" class="summernote">{!! $product->features_en !!}</textarea>
                                                @error('features_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="ru">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Ad
                                                    (Ru)</label>
                                                <div class="">
                                                    <input class="form-control" name="name_ru" type="text"
                                                        value="{{ $product?->name_ru }}" id="example-text-input">
                                                    @error('name_ru')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Zəmanət
                                                    (Ru)</label>
                                                <div class="">
                                                    <input class="form-control" name="guarantee_ru" type="text"
                                                        value="{{ $product?->guarantee_ru }}" id="example-text-input">
                                                    @error('guarantee_ru')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">Meta title
                                                        (Ru)</label>
                                                    <div>
                                                        <input class="form-control" name="meta_title_ru" type="text"
                                                            value="{{ $product?->meta_title_ru }}"
                                                            id="example-text-input">
                                                        @error('meta_title_ru')
                                                            <div class="invalid-feedback" style="display: block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt
                                                    (Ru)</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $product?->alt_image_ru }}" name="alt_image_ru">
                                                @error('alt_image_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Meta
                                                    description(Ru) </label>
                                                <div class="">
                                                    <textarea name="meta_description_ru" class="form-control">{!! $product->meta_description_ru !!}</textarea>
                                                    @error('meta_description_ru')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="image_title_ru" class="col-form-label">Img Title (Ru)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control"
                                                        value="{{ $product?->image_title_ru }}" name="image_title_ru"
                                                        id="image_title_ru">
                                                    @error('image_title_ru')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Description
                                                (Ru)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="description_ru" id="description_ru" class="summernote">{!! $product->description_ru !!}</textarea>
                                                @error('description_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Güc və sürət
                                                (Ru)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="power_and_speed_ru" id="power_and_speed_ru" class="summernote">{!! $product->power_and_speed_ru !!}</textarea>
                                                @error('power_and_speed_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Battery və
                                                Charge (Ru)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="battery_and_charge_ru" id="battery_and_charge_ru" class="summernote">{!! $product->battery_and_charge_ru !!}</textarea>
                                                @error('battery_and_charge_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Avtomobilin
                                                ölcüləri (Ru)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="size_ru" id="size_ru" class="summernote">{!! $product->size_ru !!}</textarea>
                                                @error('size_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Əlavə
                                                Xüsusiyyətlər (Ru)
                                            </label>
                                            <div class="col-sm-12">
                                                <textarea name="features_ru" id="features_ru" class="summernote">{!! $product->features_ru !!}</textarea>
                                                @error('features_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <div class="col-md-4">
                                        <label for="example-text-input" class="col-form-label">Qiymət
                                        </label>
                                        <div class="col-sm-12">
                                            <input class="form-control" name="price" type="text"
                                                value="{{ $product?->price }}" id="example-text-input">
                                            @error('price')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">İl
                                        </label>
                                        <div class="col-sm-12">
                                            <input class="form-control" name="year" type="number"
                                                value="{{ $product?->year }}" id="example-text-input">
                                            @error('year')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="example-text-input" class="col-form-label">Mühərrik həcmi
                                            (En)</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" name="engine_volume" type="text"
                                                value="{{ $product?->engine_volume }}" id="example-text-input">
                                            @error('engine_volume')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="example-text-input" class="col-form-label">Sərfiyyat
                                        </label>
                                        <div class="col-sm-12">
                                            <input class="form-control" name="expence" type="text"
                                                value="{{ $product?->expence }}" id="example-text-input">
                                            @error('expence')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="example-text-input" class="col-form-label">At gücü
                                            (En)</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" name="horse_power" type="text"
                                                value="{{ $product?->horse_power }}" id="example-text-input">
                                            @error('horse_power')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="example-text-input" class="col-form-label">Sürətlənmə
                                            (En)</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" name="expence" type="text"
                                                value="{{ $product?->expence }}" id="example-text-input">
                                            @error('expence')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="example-text-input" class="col-form-label">Battery
                                            (En)</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" name="battery" type="text"
                                                value="{{ $product?->battery }}" id="example-text-input">
                                            @error('battery')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="example-text-input" class="col-form-label">Charge
                                            (En)</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" name="charge" type="text"
                                                value="{{ $product?->charge }}" id="example-text-input">
                                            @error('charge')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="example-text-input" class="col-form-label">Maksimal yürüş
                                            (En)</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" name="max_distance" type="text"
                                                value="{{ $product?->max_distance }}" id="example-text-input">
                                            @error('max_distance')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-12">Status</label>
                                        <div class="col-sm-12">
                                            <select name="status_id" class="form-control selectric">
                                                <option value="">Status</option>
                                                @foreach ($status_s as $status)
                                                    <option value="{{ $status->id }}"
                                                        {{ $product->status_id == $status->id ? 'selected' : '' }}>
                                                        {{ $status->title_az }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label text-md-right">Kampaniya Statusu</label>
                                        <div class="col-sm-12">
                                            <select name="sale_status" class="form-control selectric" required>
                                                <option value="">Statusu seç</option>
                                                <option value="0" {{ $product->sale_status == 0 ? 'selected' : '' }}>
                                                    Kampaniya yoxdu</option>
                                                <option value="1" {{ $product->sale_status == 1 ? 'selected' : '' }}>
                                                    Kampaniya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-12">Brend</label>
                                        <div class="col-sm-12">
                                            <select name="brend_id" class="form-control selectric">
                                                <option value="">Brend</option>
                                                @foreach ($brends as $brend)
                                                    <option value="{{ $brend->id }}"
                                                        {{ $product->brend_id == $brend->id ? 'selected' : '' }}>
                                                        {{ $brend->name_az }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Model</label>
                                        <div class="col-sm-12">
                                            <select name="model_id" class="form-control selectric">
                                                <option value="">Model</option>
                                                @foreach ($models as $model)
                                                    <option value="{{ $model->id }}"
                                                        {{ $product->model_id == $model->id ? 'selected' : '' }}>
                                                        {{ $model->name_az }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Yanacaq</label>
                                        <div class="col-sm-12">
                                            <select name="fuel_id" class="form-control selectric">
                                                <option value="">Yanacaq</option>
                                                @foreach ($fuels as $fuel)
                                                    <option value="{{ $fuel->id }}"
                                                        {{ $product->fuel_id == $fuel->id ? 'selected' : '' }}>
                                                        {{ $fuel->name_az }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="image-upload" class="col-form-label">Batereya</label>
                                        <div class="col-sm-12">
                                            <div id="image-preview" class="image-preview">
                                                <input type="number" name="battery_number" class="form-control"
                                                    value="{{ $product->battery_number }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="image-upload" class="col-form-label">At gücü</label>
                                        <div class="col-sm-12">
                                            <div id="image-preview" class="image-preview">
                                                <input type="number" name="horse_number" class="form-control"
                                                    value="{{ $product->horse_number }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="acceleration_number" class="col-sm-12 col-form-label">Sürətlənmə
                                            (0-100 km/h)</label>
                                        <div class="col-sm-12">
                                            <input type="number" step="0.01" name="acceleration_number"
                                                class="form-control" value="{{ $product->acceleration_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="acceleration_number" class="col-sm-12 col-form-label">Maksimal
                                            yürüş</label>
                                        <div class="col-sm-12">
                                            <input type="number" step="0.01" name="milage_number"
                                                class="form-control" value="{{ $product->milage_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="acceleration_number"
                                            class="col-sm-12 col-form-label">Sərfiyyat</label>
                                        <div class="col-sm-12">
                                            <input type="number" step="0.01" name="expenses_number"
                                                class="form-control" value="{{ $product->expenses_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="acceleration_number" class="col-sm-12 col-form-label">Mühərrik</label>
                                        <div class="col-sm-12">
                                            <input type="number" step="0.01" name="engine_number"
                                                class="form-control" value="{{ $product->engine_number }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3 px-3">
                                          @if ($product?->all_features)
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mövcud fayl</label>
                                        <div class="col-sm-12 col-md-7">
                                        <div>
                                            <i class="fas fa-file-pdf" style="font-size: 100px;"></i>
                                        </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right ">Bütün xüsusiyyətlər</label>
                                        <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input type="file" name="all_features" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        </div>
                                    </div>
                                        <div class="row mb-3">
                                            <label for="image-upload" class="col-sm-3 col-form-label">Əsas şəkil (Ölçü
                                                670x454)</label>
                                            <div class="col-sm-10">
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Faylı seç</label>
                                                    <input type="file" name="image" id="image-upload"
                                                        accept="image/*" />
                                                    <img id="image-preview-img" style="width:200px"
                                                        src="{{ $product?->image }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Xüsusiyyətlər</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="feature-container">
                                                        @foreach ($product->features as $index => $feature)
                                                            <div class="feature-group mb-4">
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label">Xüsusiyyət
                                                                        Qrupu</label>
                                                                    <div class="col-sm-10">
                                                                        <select required
                                                                            name="features[{{ $index }}][group_id]"
                                                                            class="form-control feature-group-select">
                                                                            <option value="">Seçin</option>
                                                                            @foreach ($featureGroups as $group)
                                                                                <option value="{{ $group->id }}"
                                                                                    {{ $feature->feature_group_id == $group->id ? 'selected' : '' }}>
                                                                                    {{ $group->name_az }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-bs-toggle="tab"
                                                                            href="#feature-az-{{ $index }}"
                                                                            role="tab">
                                                                            AZ
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab"
                                                                            href="#feature-en-{{ $index }}"
                                                                            role="tab">
                                                                            EN
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab"
                                                                            href="#feature-ru-{{ $index }}"
                                                                            role="tab">
                                                                            RU
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <div
                                                                    class="tab-content p-3 border border-top-0 rounded-bottom">
                                                                    <div class="tab-pane active"
                                                                        id="feature-az-{{ $index }}"
                                                                        role="tabpanel">
                                                                        <div class="row mb-3">
                                                                            <label
                                                                                class="col-sm-2 col-form-label">Açar</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" required
                                                                                    name="features[{{ $index }}][key_az]"
                                                                                    class="form-control"
                                                                                    value="{{ $feature->key_az }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label
                                                                                class="col-sm-2 col-form-label">Dəyər</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" required
                                                                                    name="features[{{ $index }}][value_az]"
                                                                                    class="form-control"
                                                                                    value="{{ $feature->value_az }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane"
                                                                        id="feature-en-{{ $index }}"
                                                                        role="tabpanel">
                                                                        <div class="row mb-3">
                                                                            <label
                                                                                class="col-sm-2 col-form-label">Key</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" required
                                                                                    name="features[{{ $index }}][key_en]"
                                                                                    class="form-control"
                                                                                    value="{{ $feature->key_en }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label
                                                                                class="col-sm-2 col-form-label">Value</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" required
                                                                                    name="features[{{ $index }}][value_en]"
                                                                                    class="form-control"
                                                                                    value="{{ $feature->value_en }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane"
                                                                        id="feature-ru-{{ $index }}"
                                                                        role="tabpanel">
                                                                        <div class="row mb-3">
                                                                            <label
                                                                                class="col-sm-2 col-form-label">Ключ</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" required
                                                                                    name="features[{{ $index }}][key_ru]"
                                                                                    class="form-control"
                                                                                    value="{{ $feature->key_ru }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label
                                                                                class="col-sm-2 col-form-label">Значение</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" required
                                                                                    name="features[{{ $index }}][value_ru]"
                                                                                    class="form-control"
                                                                                    value="{{ $feature->value_ru }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="button"
                                                                    class="btn btn-danger remove-feature">Sil</button>
                                                                <hr>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <button type="button" id="add-feature" class="btn btn-primary">Yeni
                                                        Xüsusiyyət
                                                        Əlavə Et</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- Preview Container (Initially Hidden) -->
                        {{-- <div id="image-container" style="display: none;">
                                    <img id="image-preview-img" src="" alt="Image Preview" style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
                                </div> --}}
                        <div class="row mb-3 px-3">

                            <div class="mt-4 d-flex justify-content-end">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .cke_notifications_area {
            display: none;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description_az');
        CKEDITOR.replace('power_and_speed_az');
        CKEDITOR.replace('battery_and_charge_az');
        CKEDITOR.replace('size_az');
        CKEDITOR.replace('features_az');
        CKEDITOR.replace('description_en');
        CKEDITOR.replace('power_and_speed_en');
        CKEDITOR.replace('battery_and_charge_en');
        CKEDITOR.replace('size_en');
        CKEDITOR.replace('features_en');
        CKEDITOR.replace('description_ru');
        CKEDITOR.replace('power_and_speed_ru');
        CKEDITOR.replace('battery_and_charge_ru');
        CKEDITOR.replace('size_ru');
        CKEDITOR.replace('features_ru');
        document.addEventListener('DOMContentLoaded', function() {
            const featureContainer = document.getElementById('feature-container');
            const addFeatureBtn = document.getElementById('add-feature');
            let featureCount = {{ $product->features->count() }};

            addFeatureBtn.addEventListener('click', function() {
                const newIndex = featureCount++;

                const newFeature = document.createElement('div');
                newFeature.className = 'feature-group mb-4';
                newFeature.innerHTML = `
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Xüsusiyyət Qrupu</label>
                <div class="col-sm-10">
                    <select required name="features[${newIndex}][group_id]" class="form-control feature-group-select">
                        <option value="">Seçin</option>
                        @foreach ($featureGroups as $group)
                            <option value="{{ $group->id }}">{{ $group->name_az }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Feature Tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#feature-az-${newIndex}" role="tab">
                        AZ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#feature-en-${newIndex}" role="tab">
                        EN
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#feature-ru-${newIndex}" role="tab">
                        RU
                    </a>
                </li>
            </ul>

            <div class="tab-content p-3 border border-top-0 rounded-bottom">
                <!-- AZ Tab -->
                <div class="tab-pane active" id="feature-az-${newIndex}" role="tabpanel">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Açar</label>
                        <div class="col-sm-10">
                            <input type="text" name="features[${newIndex}][key_az]" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Dəyər</label>
                        <div class="col-sm-10">
                            <input type="text" name="features[${newIndex}][value_az]" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- EN Tab -->
                <div class="tab-pane" id="feature-en-${newIndex}" role="tabpanel">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Key</label>
                        <div class="col-sm-10">
                            <input type="text" name="features[${newIndex}][key_en]" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Value</label>
                        <div class="col-sm-10">
                            <input type="text" name="features[${newIndex}][value_en]" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- RU Tab -->
                <div class="tab-pane" id="feature-ru-${newIndex}" role="tabpanel">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Ключ</label>
                        <div class="col-sm-10">
                            <input type="text" required name="features[${newIndex}][key_ru]" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Значение</label>
                        <div class="col-sm-10">
                            <input type="text" required name="features[${newIndex}][value_ru]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-danger remove-feature">Sil</button>
            <hr>
        `;

                featureContainer.appendChild(newFeature);
                const tab = new bootstrap.Tab(newFeature.querySelector('.nav-link'));
            });

            featureContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-feature')) {
                    e.target.closest('.feature-group').remove();
                }
            });
        });
    </script>
@endpush
@push('js')
    <script>
        document.getElementById('image-upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const imageUrl = URL.createObjectURL(file);
                const imagePreviewImg = document.getElementById('image-preview-img');
                imagePreviewImg.src = imageUrl;

                const imgContainer = document.getElementById('image-container');
                imgContainer.style.display = 'flex';
                imgContainer.style.justifyContent = 'center';
                imgContainer.style.alignItems = 'center';
            }
        });
    </script>
@endpush
