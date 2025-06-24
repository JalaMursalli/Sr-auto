@extends('backend.layouts.layout')
@section('content')
    <section class="section " style="margin-top: 80px">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header align-items-end d-flex justify-content-between">
                            <div>
                                <h4>Qiymət aralığının siyahısı</h4>
                                {{-- <div class="card-header-form">
                                <!-- Search Form -->
                                <form action="{{ route('backend.price.index') }}" method="GET" class="d-flex"
                                    style="max-width: 400px;">
                                    <input type="text" name="search" class="form-control me-2"
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div> --}}
                            </div>
                            <a href="{{ route('backend.price.create') }}" class="btn btn-primary">Yeni Aralıq yarat</a>
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
                                        <th>Marka</th>
                                        <th>Min Qiymət</th>
                                        <th>Max Qiymət</th>
                                        <th>Created At</th>
                                        <th class="text-end d-flex align-items-center justify-content-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($prices as $key => $price)
                                        <tr>
                                            <td>{{ $prices->firstItem() + $key }}</td>
                                            <td>{{ $price->brend?->name ?? ' - ' }}</td>
                                            <td>{{ $price->min_price }}</td>
                                            <td>{{ $price->max_price }}</td>
                                            <td>{{ $price->created_at }}</td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end " style="gap: 20px">
                                                    <a href="{{ route('backend.price.edit', $price?->id ?? '') }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('backend.price.destroy', $price?->id ?? '') }}"
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
                                            <td colspan="3" class="text-center">Qiymət tapılmadı</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex salam justify-content-end">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
