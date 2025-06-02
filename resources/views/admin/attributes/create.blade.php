@extends('admin.layouts.app')
@section('title')
    Thêm thuộc tính sản phẩm
@endsection
@section('title_topbar')
    Thêm thuộc tính sản phẩm
@endsection

@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm thuộc tính mới</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.attributes.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tên thuộc tính</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nhập tên thuộc tính" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Giá trị thuộc tính</label>
                                        <input type="text" name="values" class="form-control" placeholder="Nhập các giá trị, phân cách bằng dấu phẩy" required>
                                        <small class="text-muted">Ví dụ: Đỏ, Xanh, Vàng</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top">
                                <button type="submit" class="btn btn-primary">Lưu thuộc tính</button>
                                <a href="{{ route('admin.attributes.index') }}" class="btn btn-light ms-2">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
