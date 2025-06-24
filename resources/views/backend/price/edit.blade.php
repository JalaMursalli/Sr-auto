@extends('backend.layouts.layout')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Yeni Xidmət</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="needs-validation" method="POST"
                                action="{{ route('backend.price.update', $price->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row mb-3 px-3">
                                    <label for="example-price-input" class="col-sm-2 col-form-label">Min Qiymət</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="min_price" type="number" step="0.01"
                                            value="{{ $price?->min_price }}" id="example-price-input">
                                        @error('price')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <label for="example-price-input" class="col-sm-2 col-form-label">Max Qiymət</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="max_price" type="number" step="0.01"
                                            value="{{ $price?->max_price }}" id="example-price-input">
                                        @error('price')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <label for="example-brend-input" class="col-sm-2 col-form-label">Marka</label>
                                    <div class="col-sm-10">
                                        <select name="brend_id" id="example-brend-input" class="form-select">
                                            <option value="">Seçim edin</option>
                                            @foreach ($brends as $brend)
                                                <option value="{{ $brend->id }}"
                                                    {{ old('brend_id', $price->brend_id) == $brend->id ? 'selected' : '' }}>
                                                    {{ $brend->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brend_id')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Yarat</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
