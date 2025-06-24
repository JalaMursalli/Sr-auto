@extends('backend.layouts.layout')
@section('content')
    <section class="section " style="margin-top: 80px">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header align-items-end d-flex justify-content-between">
                            <div>
                                <h4>Məhsulların siyahısı</h4>
                                <div class="card-header-form">
                                    <form action="{{ route('backend.product.index') }}" method="GET" class="d-flex"
                                        style="max-width: 400px;">
                                        <input type="text" name="search" class="form-control me-2"
                                            value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </form>
                                </div>
                            </div>
                            <a href="{{ route('backend.product.create') }}" class="btn btn-primary">Yeni Məhsul yarat</a>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Şəkil</th>
                                        <th>Ad</th>
                                        <th>Slug</th>
                                        <th>Yanacaq növü</th>
                                        <th>Qiymət</th>
                                        <th>Created At</th>
                                        <th class="text-end d-flex align-items-center justify-content-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $key => $product)
                                        <tr>
                                            <td>{{ $products->firstItem() + $key }}</td>
                                            <td>
                                                <img src="{{ asset($product->image) }}" alt=""
                                                    style="height: 70px; width: 70px">
                                            </td>
                                            <td>{{ $product->name_az }}</td>
                                            <td>{{ $product->slug_az }}</td>
                                            <td>{{ $product?->fuel?->name_az }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end " style="gap: 20px">
                                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalCenter"
                                                        onclick="open_modal({{ $product->id }})">
                                                        <i class="mdi mdi-plus-box-outline"></i>
                                                    </button>
                                                    <a href="{{ route('backend.product-image.index', ['product_id' => $product->id]) }} "
                                                        class="btn btn-primary btn-sm">
                                                        <i class="mdi mdi-image"></i>
                                                    </a>
                                                    <a href="{{ route('backend.product-icon.index', ['product_id' => $product->id]) }}"
                                                        class="btn  btn-dark btn-sm">
                                                        <i class="mdi mdi-camera"></i>
                                                    </a>
                                                    <a href="{{ route('backend.product.edit', $product?->id ?? '') }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('backend.product.destroy', $product?->id ?? '') }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm ml-2"
                                                            onclick="return confirm('Əminsiniz?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Məhsul tapılmadı</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex salam justify-content-end">
                                {{ $products->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('backend.offer.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Həftənin təklifləri</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="datePicker" class="form-label">Tarix</label>
                                    <input type="date" name="date" class="form-control" id="datePicker">
                                </div>
                                @php
                                    $switchId = 'switch' . $product->id;
                                @endphp
                                <div class="mb-3">
                                    <label for="statusSwitch" class="form-label">Status</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="{{ $switchId }}"
                                            name="status" data-id="{{ $product->id }}"
                                            {{ $product->status ? 'checked' : '' }} switch="bool">
                                        <label class="form-check-label" for="{{ $switchId }}">
                                            {{ $product->status ? '' : '' }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="deleteButton">Sil</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                                <button type="submit" class="btn btn-primary" id="confirmButton">Təsdiq et</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('confirmButton').addEventListener('click', function() {
                const selectedDate = document.getElementById('datePicker').value;
            });
            document.getElementById('deleteButton').addEventListener('click', function() {
                let product_id = document.querySelector('[name="product_id"]').value;
                fetch(`/admin/offer/destroy`, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            '_token': "{{ csrf_token() }}",
                            'product_id': product_id
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status == 'success') {
                            toastr.success(data.message);
                        } else {
                            toastr.error(data.message);
                        }
                    });
            });
        });

        function open_modal(id) {
            document.querySelector('[name="product_id"]').value = id;
            let url = `/admin/offer?product_id=${id}`;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        document.querySelector('[name="date"]').value = data.data.date;
                        document.querySelector('[name="status"]').checked = data.data.status;
                    }
                })
        }
    </script>
@endpush
