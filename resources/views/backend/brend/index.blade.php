@extends('backend.layouts.layout')
@section('content')
    <section class="section " style="margin-top: 80px">
     <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header align-items-end d-flex justify-content-between">
                           <div>
                            <h4>Brendlər</h4>
                            <div class="card-header-form">
                                <form action="{{ route('backend.brend.index') }}" method="GET" class="d-flex"
                                    style="max-width: 400px;">
                                    <input type="text" name="search" class="form-control me-2"
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                           </div>
                            <a href="{{ route('backend.brend.create') }}" class="btn btn-primary">Yeni brend yarat</a>
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
                                        <th>Nömrə</th>
                                        <th>Created At</th>
                                        <th class="text-end d-flex align-items-center justify-content-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($brends as $key => $brend)
                                        <tr>
                                            <td>{{ $brends->firstItem() + $key }}</td>
                                            <td>
                                                <img src="{{ asset($brend->image) }}" alt=""
                                                    style="height: 70px; weight: 70px">
                                            </td>
                                            <td>{{ $brend->name_az }}</td>
                                            <td>{{ $brend->phone_number }}</td>
                                            <td>{{ $brend->created_at }}</td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end " style="gap: 20px">
                                                       <a href="{{ route('backend.contactDetail.index', ['brend_id' => $brend->id]) }}"
                                                        class="btn  btn-dark btn-sm">
                                                        <i class="mdi mdi-plus-box-outline"></i>
                                                    </a>
                                                     <a href="{{ route('backend.brend-social.index', ['brend_id' => $brend->id]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="mdi mdi-camera"></i>
                                                    </a>
                                                    <a href="{{ route('backend.brend.edit', $brend?->id ?? '') }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form
                                                        action="{{ route('backend.brend.destroy', $brend?->id ?? '') }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm ml-2"
                                                            onclick="return confirm('Əminsiniz?')">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Brend tapılmadı</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex salam justify-content-end">
                                {{ $brends->appends(['search' => request('search')])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
