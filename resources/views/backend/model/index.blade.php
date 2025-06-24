@extends('backend.layouts.layout')
@section('content')
    <section class="section " style="margin-top: 80px">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header align-items-end d-flex justify-content-between">
                            <div>
                                <h4>Modellər</h4>
                                <div class="card-header-form">
                                    <form action="{{ route('backend.model.index') }}" method="GET" class="d-flex"
                                        style="max-width: 400px;">
                                        <input type="text" name="search" class="form-control me-2"
                                            value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </form>
                                </div>
                            </div>
                            <a href="{{ route('backend.model.create') }}" class="btn btn-primary">Yeni Model yarat</a>
                        </div>

                        <div class="card-body py-5">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ad</th>
                                        <th>Brend</th>
                                        <th>Created At</th>
                                        <th class="text-end d-flex align-items-center justify-content-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($models as $key => $model)
                                        <tr>
                                            <td>{{ $models->firstItem() + $key }}</td> 
                                            <td>{{ $model?->name_az }}</td>
                                            <td>{{ $model?->brend?->name_az }}</td>
                                            <td>{{ $model->created_at }}</td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end " style="gap: 20px">
                                                    <a href="{{ route('backend.model.edit', $model?->id ?? '') }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    <form action="{{ route('backend.model.destroy', $model?->id ?? '') }}"
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
                                            <td colspan="3" class="text-center">Model tapılmadı</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $models->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
