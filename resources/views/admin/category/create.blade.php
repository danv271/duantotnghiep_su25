@extends('admin.layouts.app')


@section('content')
<div class="container mt-4">
    <h2>Thêm danh mục mới</h2>

    <form>
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên danh mục">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" rows="3" placeholder="Mô tả danh mục"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
