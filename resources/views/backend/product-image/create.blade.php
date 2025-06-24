@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Yeni Şəkil</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('backend.product-image.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ request('product_id') }}">
                                  <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Şəkil (720x706)</label>
                                    <div class="col-sm-10">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Faylı seç</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>
                                <div id="image-container" style="display: none;">
                                    <img id="image-preview-img" src="" alt="Image Preview"
                                        style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
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

