@extends('admin.layouts.app')


@section('content')
<div class="container mt-4">
    <h2>Chỉnh sửa danh mục</h2>

    <form>
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" value="Áo sơ mi">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" rows="3">Danh mục các loại áo sơ mi nam</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection

