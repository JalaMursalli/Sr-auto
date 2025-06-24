@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ isset($featureGroup) ? 'Qrupu Düzəlt' : 'Yeni Qrup Əlavə Et' }}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ isset($featureGroup) ? route('backend.feature-groups.update', $featureGroup->id) : route('backend.feature-groups.store') }}">
                            @csrf
                            @if(isset($featureGroup))
                                @method('PUT')
                            @endif

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Ad (AZ)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name_az" class="form-control" value="{{ $featureGroup->name_az ?? old('name_az') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Ad (EN)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name_en" class="form-control" value="{{ $featureGroup->name_en ?? old('name_en') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Ad (RU)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name_ru" class="form-control" value="{{ $featureGroup->name_ru ?? old('name_ru') }}" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Icon</label>
                                <div class="col-sm-10">
                                    <input type="file" name="icon" class="form-control">
                                    @if(isset($featureGroup) && $featureGroup->icon)
                                        <img src="{{ asset($featureGroup->icon) }}" alt="icon" width="50" class="mt-2">
                                    @endif
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Color</label>
                                <div class="col-sm-10">
                                    <input type="color" name="color" class="form-control form-control-color" value="{{ $featureGroup->color ?? old('color', '#000000') }}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">{{ isset($featureGroup) ? 'Yadda Saxla' : 'Əlavə Et' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
