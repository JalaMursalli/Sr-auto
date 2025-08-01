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
                            <form class="needs-validation" method="POST" action="{{ route('backend.success.update', 1) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq
                                                    (Az)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="title_az" type="text"
                                                        value="{{ $success?->title_az }}" id="example-text-input">
                                                    @error('title_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                             <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Button Başlıq
                                                    (Az)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="btn_title_az" type="text"
                                                        value="{{ $success?->btn_title_az }}" id="example-text-input">
                                                    @error('btn_title_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                              <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn (Az)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description_az" id="description_az" class="form-control">{!! $success?->description_az !!}</textarea>
                                                @error('description_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="en">
                                        <div class="row mb-3">
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq
                                                    (En)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="title_en" type="text"
                                                        value="{{ $success?->title_en }}" id="example-text-input">
                                                    @error('title_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                           <div class="row mb-3">
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Button Başlıq
                                                    (En)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="btn_title_en" type="text"
                                                        value="{{ $success?->btn_title_en }}" id="example-text-input">
                                                    @error('btn_title_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                           <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn (En)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description_en" id="description_en" class="form-control">{!! $success?->description_en !!}</textarea>
                                                @error('description_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="ru">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq
                                                (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_ru" type="text"
                                                    value="{{ $success?->title_ru }}" id="example-text-input">
                                                @error('title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                          <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Button Başlıq
                                                (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="btn_title_ru" type="text"
                                                    value="{{ $success?->btn_title_ru }}" id="example-text-input">
                                                @error('btn_title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                             <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn (Ru)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description_ru" id="description_ru" class="form-control">{!! $success?->description_ru !!}</textarea>
                                                @error('description_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Url</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="url" type="text"
                                                value="{{ $success?->url }}" id="example-text-input">
                                            @error('url')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                   <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="image-upload" class="col-sm-2 col-form-label">Əsas şəkil (Ölçü
                                            538x230)</label>
                                        <div class="col-sm-10">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Faylı seç</label>
                                                <input type="file" name="image" id="image-upload" accept="image/*" />
                                                <img style="width:200px" src="{{$success?->image}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="image-container" style="display: none;">
                                    <img id="image-preview-img" src="" alt="Image Preview" style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
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
@push('js')
<script>
    function setupImagePreview(inputId, previewId, containerId) {
        const input = document.getElementById(inputId);
        const previewImg = document.getElementById(previewId);
        const container = document.getElementById(containerId);

        if (input && previewImg && container) {
            input.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const imageUrl = URL.createObjectURL(file);
                    previewImg.src = imageUrl;
                    container.style.display = 'flex';
                }
            });
        }
    }
    setupImagePreview('image-upload', 'image-preview-img', 'image-container');
</script>
@endpush

