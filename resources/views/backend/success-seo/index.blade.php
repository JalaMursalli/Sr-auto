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
                        <form class="needs-validation" method="POST" action="{{ route('backend.success-seo.update',1) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta title (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="meta_title_az" type="text" value="{{ $success?->meta_title_az }}"
                                                    id="example-text-input">
                                                @error('meta_title_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta Description (Az) </label>
                                            <div class="col-sm-10">
                                                <textarea name="meta_description_az" class="form-control">{!!$success?->meta_description_az !!}</textarea>
                                                    @error('meta_description_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="en">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta title (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="meta_title_en" type="text" value="{{ $success?->meta_title_en }}"
                                                    id="example-text-input">
                                                @error('meta_title_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta Description(En) </label>
                                            <div class="col-sm-10">
                                                <textarea name="meta_description_en" class="form-control">{!!$success?->meta_description_en !!}</textarea>
                                                    @error('meta_description_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="ru">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta title (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="meta_title_ru" type="text" value="{{ $success?->meta_title_ru }}"
                                                    id="example-text-input">
                                                @error('meta_title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta description(Ru) </label>
                                            <div class="col-sm-10">
                                                <textarea name="meta_description_ru" class="form-control">{!!$success?->meta_description_ru !!}</textarea>
                                                    @error('meta_description_ru')
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
                                        <label for="image-upload" class="col-sm-2 col-form-label">Image</label>
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
