@extends('admin.layouts.app')

@section('title', 'Categories Management')

@section('content')
<!-- Start Container Fluid -->
<div class="container-xxl">
@if(session('Thành công'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('Thành công') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('Lỗi'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ session('Lỗi') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <!-- Start Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Quản lý danh mục</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh mục</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Start Stats Cards -->
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Tổng danh mục</h5>
                            <h2 class="mb-0">{{ $totalCategories }}</h2>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-primary-subtle rounded">
                                <iconify-icon icon="solar:folder-broken" class="text-primary fs-24"></iconify-icon>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Danh mục hoạt động</h5>
                            <h2 class="mb-0">{{ $activeCategories }}</h2>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-success-subtle rounded">
                                <iconify-icon icon="solar:check-circle-broken" class="text-success fs-24"></iconify-icon>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Danh mục chính</h5>
                            <h2 class="mb-0">{{ $categories->where('parent_category_id', null)->count() }}</h2>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-secondary-subtle rounded">
                                <iconify-icon icon="solar:folder-broken" class="text-secondary fs-24"></iconify-icon>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Danh mục phụ</h5>
                            <h2 class="mb-0">{{ $subcategories }}</h2>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-info-subtle rounded">
                                <iconify-icon icon="solar:folder-with-files-broken" class="text-info fs-24"></iconify-icon>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Stats Cards -->

    <!-- Start Categories List -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Tất cả danh mục</h4>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                            <iconify-icon icon="solar:add-circle-broken" class="align-middle me-1"></iconify-icon>
                            Thêm danh mục
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <iconify-icon icon="solar:menu-dots-broken" class="align-middle"></iconify-icon>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><iconify-icon icon="solar:import-broken" class="align-middle me-1"></iconify-icon> Import</a></li>
                                <li><a class="dropdown-item" href="#"><iconify-icon icon="solar:export-broken" class="align-middle me-1"></iconify-icon> Export</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('admin.categories.trashed') }}"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle me-1"></iconify-icon> Thùng rác</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle me-1"></iconify-icon> Xóa đã chọn</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-hover mb-0">
                            <thead class="bg-light-subtle">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="selectAll">
                                            <label class="form-check-label" for="selectAll"></label>
                                        </div>
                                    </th>
                                    <th>Danh mục</th>
                                    <th>ID</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="category{{ $category->id }}">
                                            <label class="form-check-label" for="category{{ $category->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div>
                                                <p class="text-dark fw-medium fs-15 mb-0">
                                                    @if($category->parent)
                                                        <span class="text-muted">{{ $category->parent->name }}</span>
                                                        <iconify-icon icon="solar:alt-arrow-right-broken" class="align-middle mx-1"></iconify-icon>
                                                    @endif
                                                    {{ $category->category_name }}
                                                </p>
                                                <div class="d-flex gap-2 mt-1">
                                                    @if($category->children->count() > 0)
                                                        <span class="badge bg-info-subtle text-info">
                                                            <iconify-icon icon="solar:folder-broken" class="align-middle"></iconify-icon>
                                                            {{ $category->children->count() }} Danh mục con
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <span class="text-truncate d-inline-block" style="max-width: 200px;">
                                            {{ $category->description }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $category->status === 'active' ? 'success' : 'danger' }}-subtle text-{{ $category->status === 'active' ? 'success' : 'danger' }}">
                                            {{ ucfirst($category->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-light btn-sm" data-bs-toggle="tooltip" title="Xem chi tiết">
                                                <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-soft-primary btn-sm" data-bs-toggle="tooltip" title="Sửa">
                                                <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-soft-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa danh mục không?')" data-bs-toggle="tooltip" title="Xóa">
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
                <div class="card-footer border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Hiển thị {{ $categories->count() }} trong số {{ $totalCategories }} mục
                        </div>
                        <div>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories List -->
</div>
<!-- End Container Fluid -->
@endsection

@section('scripts')
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    // Select all checkbox functionality
    document.getElementById('selectAll').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('tbody .form-check-input');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = document.getElementById('selectAll').checked;
        });
    });
</script>
@endsection