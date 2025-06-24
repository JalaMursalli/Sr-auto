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
                            <form class="needs-validation" method="POST" action="{{ route('backend.contactDetail.update', ['contactDetail'=>$contact?->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="hidden" name="brend_id" value="{{ request()->brend_id}}">
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Satış Ünvan:
                                                    (Az)</label>
                                                <div class="">
                                                    <input class="form-control" name="service_address_az" type="text"
                                                        value="{{ $contact?->service_address_az }}" id="example-text-input">
                                                    @error('service_address_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Servis Ünvan:
                                                    (Az)</label>
                                                <div class="">
                                                    <input class="form-control" name="sale_address_az" type="text"
                                                        value="{{ $contact?->sale_address_az }}" id="example-text-input">
                                                    @error('sale_address_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="en">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Satış Ünvan:
                                                    (En)</label>
                                                <div class="">
                                                    <input class="form-control" name="sale_address_en" type="text"
                                                        value="{{ $contact?->sale_address_en }}" id="example-text-input">
                                                    @error('sale_address_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Servis Ünvan:
                                                    (En)</label>
                                                <div class="">
                                                    <input class="form-control" name="sale_address_en" type="text"
                                                        value="{{ $contact?->sale_address_en }}" id="example-text-input">
                                                    @error('sale_address_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="ru">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                            <label for="example-text-input" class="col-form-label">Satış Ünvan:
                                                (Ru)</label>
                                            <div class="">
                                                <input class="form-control" name="sale_address_ru" type="text"
                                                    value="{{ $contact?->sale_address_ru }}" id="example-text-input">
                                                @error('sale_address_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <label for="example-text-input" class="col-form-label">Servis Ünvan:
                                                (Ru)</label>
                                            <div class="">
                                                <input class="form-control" name="sale_address_ru" type="text"
                                                    value="{{ $contact?->sale_address_ru }}" id="example-text-input">
                                                @error('sale_address_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                 <div class="row mb-3 px-3">
                                  <h2>Satış məlumatları</h2>
                                 <div class="col-md-6">
                                    <label for="example-text-input" class="col-form-label">Nömrə1</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="sale_contact_number1" type="text"
                                            value="{{ $contact?->sale_contact_number1 }}" id="example-text-input">
                                        @error('sale_contact_number1')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                   <div class="col-md-6">
                                    <label for="example-text-input" class="col-form-label">Nömrə2</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="sale_contact_number2" type="text"
                                            value="{{ $contact?->sale_contact_number2 }}" id="example-text-input">
                                        @error('sale_contact_number2')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                   <div class="col-md-6">
                                    <label for="example-text-input" class="col-form-label">Nömrə3</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="sale_contact_number3" type="text"
                                            value="{{ $contact?->sale_contact_number3 }}" id="example-text-input">
                                        @error('sale_contact_number3')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                       <div class="col-md-6">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="sale_email" type="text"
                                            value="{{ $contact?->sale_email }}" id="example-text-input">
                                        @error('sale_email')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                                <div class="row mb-3 px-3">
                                  <h2>Servis məlumatları</h2>
                                 <div class="col-md-6">
                                    <label for="example-text-input" class="col-form-label">Nömrə1</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="service_contact_number1" type="text"
                                            value="{{ $contact?->service_contact_number1 }}" id="example-text-input">
                                        @error('service_contact_number1')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                   <div class="col-md-6">
                                    <label for="example-text-input" class="col-form-label">Nömrə2</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="service_contact_number2" type="text"
                                            value="{{ $contact?->service_contact_number2 }}" id="example-text-input">
                                        @error('service_contact_number2')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                   <div class="col-md-6">
                                    <label for="example-text-input" class="col-form-label">Nömrə3</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="service_contact_number3" type="text"
                                            value="{{ $contact?->service_contact_number3 }}" id="example-text-input">
                                        @error('service_contact_number3')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                       <div class="col-md-6">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="service_email" type="text"
                                            value="{{ $contact?->service_email }}" id="example-text-input">
                                        @error('service_email')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                                 <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Waze Url</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="waze_url" type="text"
                                                value="{{ $contact?->waze_url }}" id="example-text-input">
                                            @error('waze_url')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </form>
            </div> 
        </div>
    @endsection


