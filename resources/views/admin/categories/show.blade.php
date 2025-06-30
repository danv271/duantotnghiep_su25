@extends('admin.layouts.app')

@section('title', 'Category Details')

@section('content')
<!-- Start Container Fluid -->
<div class="container-xxl">
    <!-- Start Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Category Details</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Start Category Details -->
    <div class="row">
        <div class="col-lg-4">
            <!-- Category Info Card -->
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h4 class="mb-1">{{ $category->category_name }}</h4>
                        <p class="text-muted mb-0">ID: #{{ $category->id }}</p>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" class="ps-0">Status</th>
                                    <td class="text-end">
                                        <span class="badge bg-{{ $category->status === 'active' ? 'success' : 'danger' }}-subtle text-{{ $category->status === 'active' ? 'success' : 'danger' }}">
                                            {{ ucfirst($category->status) }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="ps-0">Created</th>
                                    <td class="text-end">{{ $category->created_at->format('M d, Y') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="ps-0">Last Updated</th>
                                    <td class="text-end">{{ $category->updated_at->format('M d, Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary w-100">
                            <iconify-icon icon="solar:pen-2-broken" class="align-middle me-1"></iconify-icon>
                            Edit Category
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <!-- Category Details Card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Category Information</h4>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="fs-15 mb-3">Description</h5>
                        <p class="text-muted mb-0">{{ $category->description ?? 'No description available.' }}</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="fs-15 mb-3">Parent Category</h5>
                        @if($category->parent)
                            <div>
                                <h6 class="mb-0">{{ $category->parent->name }}</h6>
                                <p class="text-muted mb-0">ID: #{{ $category->parent->id }}</p>
                            </div>
                        @else
                            <p class="text-muted mb-0">This is a parent category.</p>
                        @endif
                    </div>

                    <div class="mb-4">
                        <h5 class="fs-15 mb-3">Subcategories</h5>
                        @if($category->children->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-centered table-hover mb-0">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category->children as $child)
                                        <tr>
                                            <td>
                                                <div>
                                                    <h6 class="mb-0">{{ $child->name }}</h6>
                                                    <p class="text-muted mb-0">ID: #{{ $child->id }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $child->status === 'active' ? 'success' : 'danger' }}-subtle text-{{ $child->status === 'active' ? 'success' : 'danger' }}">
                                                    {{ ucfirst($child->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('admin.categories.show', $child->id) }}" class="btn btn-light btn-sm" data-bs-toggle="tooltip" title="View">
                                                        <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <a href="{{ route('admin.categories.edit', $child->id) }}" class="btn btn-soft-primary btn-sm" data-bs-toggle="tooltip" title="Edit">
                                                        <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted mb-0">No subcategories found.</p>
                        @endif
                    </div>

                  
                </div>
            </div>
        </div>
    </div>
    <!-- End Category Details -->
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
</script>
@endsection 