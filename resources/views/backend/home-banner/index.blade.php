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
                   <form class="needs-validation" method="POST" action="{{ route('backend.home.update',1) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_az" type="text" value="{{ $home?->title_az }}"
                                                    id="example-text-input">
                                                @error('title_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="en">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_en" type="text" value="{{ $home?->title_en }}"
                                                    id="example-text-input">
                                                @error('title_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="ru">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_ru" type="text" value="{{ $home?->title_ru }}"
                                                    id="example-text-input">
                                                @error('title_ru')
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
                                        <label for="image-upload" class="col-sm-2 col-form-label"> Banner (Ölçü
                                            1440x860)</label>
                                        <div class="col-sm-10">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Faylı seç</label>
                                                <input type="file" name="banner" id="image-upload"  />
                                                {{-- <img style="width:200px" src="{{$home?->banner}}" alt=""> --}}
                                                <video controls style="width:400px" >
                                                    <source src="{{asset($home?->banner)}}" >
                                                </video>
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
                                      const previewContainer = document.getElementById('image-container');
                                     const previewImg = document.getElementById('image-preview-img');

                                  if (file.type.startsWith('image')) {

                                  previewImg.src = imageUrl;
                                  previewImg.style.display = 'block';
                                  previewContainer.style.display = 'flex';
                                 } else if (file.type.startsWith('video')) {
                                  const video = document.createElement('video');
                                 video.src = imageUrl;
                                 video.controls = true;
                                  previewContainer.innerHTML = '';
                                 previewContainer.appendChild(video);
                                 previewContainer.style.display = 'flex';
                                 }
                            }
                        });
                        </script>
                                <div class="row mb-3 px-3">
                                    <div class="mt-4 d-flex justify-content-end">
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
