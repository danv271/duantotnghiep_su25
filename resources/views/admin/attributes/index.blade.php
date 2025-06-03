@extends('admin.layouts.app')
@section('title')
    Quản lý thuộc tính sản phẩm
@endsection
@section('title_topbar')
    Quản lý thuộc tính sản phẩm
@endsection

@push('styles')
<style>
    .pagination {
        --bs-pagination-padding-x: 0.5rem;
        --bs-pagination-padding-y: 0.25rem;
        --bs-pagination-font-size: 0.75rem;
        --bs-pagination-border-radius: 0.25rem;
        gap: 0.25rem;
    }
    .pagination .page-link {
        border-radius: var(--bs-pagination-border-radius) !important;
        min-width: 24px;
        height: 24px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        color: #6c757d;
        border: none;
        background: #f5f5f5;
    }
    .pagination .page-item.active .page-link {
        background-color: var(--bs-primary);
        color: #fff;
        border: none;
    }
    .pagination .page-link:hover {
        background-color: #e9ecef;
        color: var(--bs-primary);
        border: none;
    }
    .pagination .page-item.disabled .page-link {
        background-color: #f5f5f5;
        color: #adb5bd;
        border: none;
    }
</style>
@endpush

@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title">Danh sách thuộc tính</h4>
                        </div>
                        <div class="d-flex align-items-center gap-2"></div>
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
                    <div class="card-footer py-2">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="text-muted fs-13">
                                    Hiển thị {{ $attributes->firstItem() ?? 0 }}-{{ $attributes->lastItem() ?? 0 }} của {{ $attributes->total() }} bản ghi
                                </span>
                            </div>
                            <div class="col-auto">
                                {{ $attributes->appends(request()->query())->onEachSide(1)->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function changePerPage(select) {
            const params = new URLSearchParams(window.location.search);
            params.set('per_page', select.value);
            window.location.search = params.toString();
        }
    </script>
    @endpush
@endsection
