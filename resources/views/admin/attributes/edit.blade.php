@extends('admin.layouts.app')
@section('title')
    Sửa thuộc tính sản phẩm
@endsection
@section('title_topbar')
    Sửa thuộc tính sản phẩm
@endsection
@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sửa thuộc tính</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tên thuộc tính</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $attribute->name) }}" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Giá trị thuộc tính</label>
                                        <input type="text" name="values" class="form-control"
                                            value="{{ old('values', $attribute->attributesValues->pluck('value')->implode(', ')) }}" >
                                        <small class="text-muted">Nhập các giá trị, phân cách bằng dấu phẩy</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top">
                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                <a href="{{ route('admin.attributes.index') }}" class="btn btn-light ms-2">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
