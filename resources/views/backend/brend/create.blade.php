@extends('backend.layouts.layout')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Yeni Brend</h4>
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
                            <form class="needs-validation" method="POST" action="{{ route('backend.brend.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <label for="name_az" class="col-sm-2 col-form-label">Ad (Az)</label>
                                            <div class="col-sm-10">
                                                <input id="name_az" name="name_az" type="text"
                                                       class="form-control" value="{{ old('name_az') }}">
                                                @error('name_az')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="country_az" class="col-sm-2 col-form-label">Ölkə (Az)</label>
                                            <div class="col-sm-10">
                                                <input id="country_az" name="country_az" type="text"
                                                       class="form-control" value="{{ old('country_az') }}">
                                                @error('country_az')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="alt_image_az" class="col-sm-2 col-form-label">Alt (Az)</label>
                                            <div class="col-sm-10">
                                                <input id="alt_image_az" name="alt_image_az" type="text"
                                                       class="form-control" value="{{ old('alt_image_az') }}">
                                                @error('alt_image_az')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="image_title_az" class="col-sm-2 col-form-label">Img Title (Az)</label>
                                            <div class="col-sm-10">
                                                <input id="image_title_az" name="image_title_az" type="text"
                                                       class="form-control" value="{{ old('image_title_az') }}">
                                                @error('image_title_az')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="en">
                                        <div class="row mb-3">
                                            <label for="name_en" class="col-sm-2 col-form-label">Ad (En)</label>
                                            <div class="col-sm-10">
                                                <input id="name_en" name="name_en" type="text"
                                                       class="form-control" value="{{ old('name_en') }}">
                                                @error('name_en')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="country_en" class="col-sm-2 col-form-label">Ölkə (En)</label>
                                            <div class="col-sm-10">
                                                <input id="country_en" name="country_en" type="text"
                                                       class="form-control" value="{{ old('country_en') }}">
                                                @error('country_en')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="alt_image_en" class="col-sm-2 col-form-label">Alt (En)</label>
                                            <div class="col-sm-10">
                                                <input id="alt_image_en" name="alt_image_en" type="text"
                                                       class="form-control" value="{{ old('alt_image_en') }}">
                                                @error('alt_image_en')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="image_title_en" class="col-sm-2 col-form-label">Img Title (En)</label>
                                            <div class="col-sm-10">
                                                <input id="image_title_en" name="image_title_en" type="text"
                                                       class="form-control" value="{{ old('image_title_en') }}">
                                                @error('image_title_en')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="ru">
                                        <div class="row mb-3">
                                            <label for="name_ru" class="col-sm-2 col-form-label">Ad (Ru)</label>
                                            <div class="col-sm-10">
                                                <input id="name_ru" name="name_ru" type="text"
                                                       class="form-control" value="{{ old('name_ru') }}">
                                                @error('name_ru')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="country_ru" class="col-sm-2 col-form-label">Ölkə (Ru)</label>
                                            <div class="col-sm-10">
                                                <input id="country_ru" name="country_ru" type="text"
                                                       class="form-control" value="{{ old('country_ru') }}">
                                                @error('country_ru')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="alt_image_ru" class="col-sm-2 col-form-label">Alt (Ru)</label>
                                            <div class="col-sm-10">
                                                <input id="alt_image_ru" name="alt_image_ru" type="text"
                                                       class="form-control" value="{{ old('alt_image_ru') }}">
                                                @error('alt_image_ru')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="image_title_ru" class="col-sm-2 col-form-label">Img Title (Ru)</label>
                                            <div class="col-sm-10">
                                                <input id="image_title_ru" name="image_title_ru" type="text"
                                                       class="form-control" value="{{ old('image_title_ru') }}">
                                                @error('image_title_ru')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nömrə</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="phone_number" type="text"
                                            value="{{ $brend?->phone_number }}" id="example-text-input">
                                        @error('phone_number')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Whatsapp link</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="vp_url" type="text"
                                            value="{{ $brend?->vp_url }}" id="example-text-input">
                                        @error('vp_url')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Url</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="url" type="text"
                                            value="{{ $brend?->url }}" id="example-text-input">
                                        @error('url')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">  şəkil (Ölçü
                                            3154x106)</label>
                                        <div class="col-sm-10">
                                            <div class="image-preview" id="image-preview">
                                                <label for="image-upload-image" id="image-label">Faylı seç</label>
                                                <input type="file" name="image" id="image-upload-image" />
                                            </div>
                                            <div id="image-container" style="display: none;">
                                                <img id="image-img" src="" alt="Image Preview"
                                                    style="object-fit:cover; border-radius: 20px; width: 200px; height: 200px;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Yarat</button>
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
@push('js')
<script>
    document.getElementById('image-upload-image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const imageUrl = URL.createObjectURL(file);
            const imagePreview = document.getElementById('image-img');
            imagePreview.src = imageUrl;

            const imageContainer = document.getElementById('image-container');
            imageContainer.style.display = 'block';
        }
    });
</script>
@endpush

