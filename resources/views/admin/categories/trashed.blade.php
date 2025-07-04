@extends('admin.layouts.app')

@section('title', 'Trashed Categories')

@section('content')
<!-- Start Container Fluid -->
<div class="container-xxl">
    <!-- Start Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Trashed Categories</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active">Trashed</li>
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
                    <h4 class="card-title mb-0">Trashed Categories</h4>
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
                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to restore all categories?')">
                                            <iconify-icon icon="solar:refresh-broken" class="align-middle me-1"></iconify-icon> Restore All
                                        </button>
                                    </form>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('admin.categories.force-delete-all') }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to permanently delete all categories? This action cannot be undone!')">
                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle me-1"></iconify-icon> Delete All Permanently
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
                                        <th>Category</th>
                                        <th>ID</th>
                                        <th>Description</th>
                                        <th>Deleted At</th>
                                        <th>Action</th>
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
                                                                {{ $category->children->count() }} subcategories
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
                                                    <button type="submit" class="btn btn-soft-success btn-sm" data-bs-toggle="tooltip" title="Restore">
                                                        <iconify-icon icon="solar:refresh-broken" class="align-middle fs-18"></iconify-icon>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.categories.force-delete', $category->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-soft-danger btn-sm" onclick="return confirm('Are you sure you want to permanently delete this category? This action cannot be undone!')" data-bs-toggle="tooltip" title="Delete Permanently">
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
                            <h4 class="text-muted mb-3">No Trashed Categories</h4>
                            <p class="text-muted mb-4">There are no categories in the trash. Deleted categories will appear here.</p>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">
                                <iconify-icon icon="solar:arrow-left-broken" class="align-middle me-1"></iconify-icon>
                                Back to Categories
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