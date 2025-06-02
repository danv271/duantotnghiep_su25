@extends('admin.layouts.app')
@section('title')
    Quản lý thuộc tính sản phẩm
@endsection
@section('title_topbar')
    Quản lý thuộc tính sản phẩm
@endsection
@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title">Danh sách thuộc tính</h4>
                        </div>
                        <div>
                            <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary">Thêm thuộc tính</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0 table-hover table-centered">
                            <thead class="bg-light-subtle">
                                <tr>
                                    <th>ID</th>
                                    <th>Tên thuộc tính</th>
                                    <th>Giá trị</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attributes as $attribute)
                                <tr>
                                    <td>{{ $attribute->id }}</td>
                                    <td>{{ $attribute->name }}</td>
                                    <td>
                                        @foreach($attribute->values as $value)
                                            <span class="badge bg-primary me-1">{{ $value->value }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $attribute->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-soft-primary btn-sm">
                                                <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-soft-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa thuộc tính này?')">
                                                    <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                </button>
                                            </form>
                                        </div>
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
@endsection
