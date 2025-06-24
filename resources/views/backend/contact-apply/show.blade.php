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
                                <strong>Ad:</strong> {{ $apply->name }}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong>Soyad:</strong> {{ $apply->surname }}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong>Email:</strong> {{ $apply->email }}
                            </div>
                            <div class="col-md-6">
                                <strong>Müraciət növü:</strong> {{ $apply->application_type }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong>Yaradılma Tarixi:</strong> {{ $apply->created_at->format('d-m-Y H:i') }}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p><strong>Mesaj:</strong></p>
                                <p>{{ $apply?->text }}</p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12 text-end">
                                <a href="{{ route('backend.contact-apply.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Geri
                                </a>
                                <form action="{{ route('backend.contact-apply.destroy', $apply->id) }}" method="POST" class="d-inline">
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
