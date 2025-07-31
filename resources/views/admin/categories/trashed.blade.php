@extends('admin.layouts.app')

@section('title', 'Trashed Categories')

@section('content')
<!-- Start Container Fluid -->
<div class="container-xxl">
    <!-- Start Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Danh mục bị xóa</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Danh mục</a></li>
                        <li class="breadcrumb-item active">Đã chuyển vào thùng rác</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Start Trashed Categories List -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Danh mục bị xóa</h4>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                            <iconify-icon icon="solar:arrow-left-broken" class="align-middle me-1"></iconify-icon>
                            Back to Categories
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <iconify-icon icon="solar:menu-dots-broken" class="align-middle"></iconify-icon>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form action="{{ route('admin.categories.restore-all') }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="dropdown-item" onclick="return confirm('Bạn có chắc muốn khôi phục tất cả các danh mục không')">
                                            <iconify-icon icon="solar:refresh-broken" class="align-middle me-1"></iconify-icon> Khôi phục tất cả
                                        </button>
                                    </form>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('admin.categories.force-delete-all') }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn tất cả danh mục không? Thao tác này không thể hoàn tác!')">
                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle me-1"></iconify-icon> Xóa tất cả vĩnh viễn
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($trashedCategories->count() > 0)
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
                                        <th>Đã xóa tại</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trashedCategories as $category)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="category{{ $category->id }}">
                                                <label class="form-check-label" for="category{{ $category->id }}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                    <iconify-icon icon="solar:folder-broken" class="fs-24 text-muted"></iconify-icon>
                                                </div>
                                                <div>
                                                    <p class="text-dark fw-medium fs-15 mb-0">
                                                        @if($category->parent)
                                                            <span class="text-muted">{{ $category->parent->category_name }}</span>
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
                                            <span class="text-muted">
                                                {{ $category->deleted_at->format('M d, Y H:i') }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <form action="{{ route('admin.categories.restore', $category->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-soft-success btn-sm" data-bs-toggle="tooltip" title="Khôi phục">
                                                        <iconify-icon icon="solar:refresh-broken" class="align-middle fs-18"></iconify-icon>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.categories.force-delete', $category->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-soft-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn danh mục này không? Thao tác này không thể hoàn tác!')" data-bs-toggle="tooltip" title="Xóa vĩnh viễn">
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
                        
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $trashedCategories->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="avatar-lg mx-auto mb-4">
                                <span class="avatar-title bg-light-subtle rounded-circle">
                                    <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="text-muted fs-48"></iconify-icon>
                                </span>
                            </div>
                            <h4 class="text-muted mb-3">Không có danh mục nào bị xóa</h4>
                            <p class="text-muted mb-4">Không có danh mục nào trong thùng rác. Các danh mục đã xóa sẽ xuất hiện ở đây.</p>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">
                                <iconify-icon icon="solar:arrow-left-broken" class="align-middle me-1"></iconify-icon>
                                Quay lại danh mục
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End Trashed Categories List -->
</div>
<!-- End Container Fluid -->
@endsection

@push('scripts')
<script>
    // Select all functionality
    document.getElementById('selectAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
</script>
@endpush 