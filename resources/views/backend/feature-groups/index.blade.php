@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Xüsusiyyət Qrupları</h4>
                    <a href="{{ route('backend.feature-groups.create') }}" class="btn btn-primary">Yeni Qrup</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ad (AZ)</th>
                                    <th>Ad (EN)</th>
                                    <th>Ad (RU)</th>
                                    <th>Icon</th>
                                    <th>Color</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($featureGroups as $group)
                                <tr>
                                    <td>{{ $group->id }}</td>
                                    <td>{{ $group->name_az }}</td>
                                    <td>{{ $group->name_en }}</td>
                                    <td>{{ $group->name_ru }}</td>
                                    <td>
                                        @if($group->icon)
                                            <img src="{{ asset( $group->icon) }}" alt="icon" width="40">
                                        @else
                                            <span class="text-muted">Yoxdur</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div style="width: 25px; height: 25px; background-color: {{ $group->color ?? '#ccc' }}; border: 1px solid #000;"></div>
                                    </td>
                                    <td>
                                        <a href="{{ route('backend.feature-groups.edit', $group->id) }}" class="btn btn-sm btn-primary">Düzəlt</a>
                                        <form action="{{ route('backend.feature-groups.destroy', $group->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
