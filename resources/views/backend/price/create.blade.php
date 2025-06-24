@extends('backend.layouts.layout')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Yeni Məhsul</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="needs-validation" method="POST" action="{{ route('backend.price.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3 px-3">
                                    <label for="example-price-input" class="col-sm-2 col-form-label">Min Qiymət</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="min_price" type="text" value=""
                                            id="example-price-input">
                                        @error('min_price')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <label for="example-price-input" class="col-sm-2 col-form-label">Max Qiymət</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="max_price" type="text" value=""
                                            id="example-price-input">
                                        @error('max_price')
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
                                                <option value="{{ $brend->id }}">{{ $brend->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brend_id')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3 px-3">

                                    <div class="mt-4 d-flex justify-content-end">
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
