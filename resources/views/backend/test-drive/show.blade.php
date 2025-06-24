@extends('backend.layouts.layout')
@section('content')
<section class="section" style="margin-top: 80px">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Müraciət Detalları</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong>Ad:</strong> {{ $test->name }}
                            </div>
                            <div class="col-md-6">
                                <strong>Soyad:</strong> {{ $test->surname }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong>Telefon:</strong> {{ $test->phone }}
                            </div>
                            <div class="col-md-6">
                                <strong>Brend:</strong> {{ $test->brend_id }}
                            </div>
                            <div class="col-md-6">
                                <strong>Model:</strong> {{ $test->model_id }}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong>Yaradılma Tarixi:</strong> {{ $test->created_at->format('d-m-Y H:i') }}
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12 text-end">
                                <a href="{{ route('backend.test-drive.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Geri
                                </a>
                                <form action="{{ route('backend.test-drive.destroy', $test->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Əminsiniz?')">
                                        <i class="fas fa-trash"></i> Sil
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
