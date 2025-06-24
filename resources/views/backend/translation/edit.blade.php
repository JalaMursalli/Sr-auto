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
                        <form class="needs-validation" method="POST" action="{{ route('backend.translation.update',parameters: $translation->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row mb-3 p-3 ">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="key"   type="text"  readonly value="{{ $translation?->key }}"
                                            id="example-text-input">
                                        @error('key')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Dəyər (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="value_az" type="text" value="{{ $translation?->value_az }}"
                                                    id="example-text-input">
                                                @error('value_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="en">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Dəyər (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="value_en" type="text" value="{{ $translation?->value_en }}"
                                                    id="example-text-input">
                                                @error('value_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="ru">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Dəyər (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="value_ru" type="text" value="{{ $translation?->value_ru }}"
                                                    id="example-text-input">
                                                @error('value_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
