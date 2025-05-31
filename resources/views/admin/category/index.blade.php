@extends('admin.layouts.app')


@section('content')
<div class="container">
    <h2>Danh sách danh mục</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            {{-- Dữ liệu giả định --}}
            <tr>
                <td>1</td>
                <td>Áo sơ mi</td>
                <td>Danh mục quần áo sơ mi nam</td>
                <td>
                    <a href="{{ route('admin.category.edit') }}" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="#" class="btn btn-danger btn-sm">Xoá</a>
                </td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Thêm danh mục mới</a>
</div>
@endsection
