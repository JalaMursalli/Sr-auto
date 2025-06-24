@extends('backend.layouts.layout')
@section('content')
    <section class="section " style="margin-top: 80px">
     <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header align-items-end d-flex justify-content-between">
                           <div>
                            <h4>Müraciətlər</h4>
                            <div class="card-header-form">
                                <form action="{{ route('backend.test-drive.index') }}" method="GET" class="d-flex"
                                    style="max-width: 400px;">
                                    <input type="text" name="search" class="form-control me-2"
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                           </div>
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
                                        <th>Ad</th>
                                        <th>Soyad</th>
                                        <th>Telefon</th>
                                        <th>Created At</th>
                                        <th class="text-end d-flex align-items-center justify-content-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tests as $key => $test)
                                        <tr>
                                            <td>{{ $tests->firstItem() + $key }}</td>
                                            <td>{{ $test?->name }}</td>
                                            <td>{{ $test?->surname }}</td>
                                            <td>{{ $test?->phone }}</td>
                                            <td>{{ $test?->created_at }}</td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end " style="gap: 20px">
                                                    <a href="{{ route('backend.test-drive.show', $test?->id ?? '') }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i> Show
                                                    </a>

                                                    <form
                                                        action="{{ route('backend.test-drive.destroy', $test?->id ?? '') }}"
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
                                            <td colspan="3" class="text-center">Müraciət tapılmadı</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex salam justify-content-end">
                                {{ $tests->appends(['search' => request('search')])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
