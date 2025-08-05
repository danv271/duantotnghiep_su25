@extends('admin.layouts.app')

@section('title', 'Voucher Management')

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
                <h4 class="mb-0">Quản lý Voucher</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Voucher</li>
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
                            <h5 class="mb-1">Tổng voucher</h5>
                            <h2 class="mb-0">{{ $totalVouchers }}</h2>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-primary-subtle rounded">
                                <iconify-icon icon="solar:ticket-broken" class="text-primary fs-24"></iconify-icon>
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
                            <h5 class="mb-1">Voucher hoạt động</h5>
                            <h2 class="mb-0">{{ $activeVouchers }}</h2>
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
                            <h5 class="mb-1">Voucher hết hạn</h5>
                            <h2 class="mb-0">{{ $expiredVouchers }}</h2>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-warning-subtle rounded">
                                <iconify-icon icon="solar:clock-circle-broken" class="text-warning fs-24"></iconify-icon>
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
                            <h5 class="mb-1">Voucher sản phẩm</h5>
                            <h2 class="mb-0">{{ $productVouchers }}</h2>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-info-subtle rounded">
                                <iconify-icon icon="solar:box-broken" class="text-info fs-24"></iconify-icon>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Stats Cards -->

    <!-- Start Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Danh sách Voucher</h4>
                        <a href="{{ route('admin.vouchers.create') }}" class="btn btn-primary">
                            <iconify-icon icon="solar:add-circle-broken" class="me-1"></iconify-icon>
                            Thêm Voucher
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Mã Voucher</th>
                                    <th>Tên</th>
                                    <th>Loại</th>
                                    <th>Giá trị giảm</th>
                                    <th>Đơn hàng tối thiểu</th>
                                    <th>Sử dụng</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($vouchers as $voucher)
                                <tr>
                                    <td>{{ $voucher->id }}</td>
                                    <td>
                                        <span class="badge bg-primary">{{ $voucher->code }}</span>
                                    </td>
                                    <td>{{ $voucher->name }}</td>
                                    <td>
                                        @if($voucher->type === 'shipping')
                                            <span class="badge bg-info">Miễn phí ship</span>
                                        @else
                                            <span class="badge bg-success">{{ $voucher->getTypeLabel() }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($voucher->type === 'product' && $voucher->discount_value < 100)
                                            {{ $voucher->discount_value }}%
                                        @else
                                            {{ number_format($voucher->discount_value) }}đ
                                        @endif
                                    </td>
                                    <td>
                                        @if($voucher->min_order_amount)
                                            {{ number_format($voucher->min_order_amount) }}đ
                                        @else
                                            <span class="text-muted">Không giới hạn</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($voucher->max_usage)
                                            {{ $voucher->used_count }}/{{ $voucher->max_usage }}
                                        @else
                                            {{ $voucher->used_count }}/∞
                                        @endif
                                    </td>
                                    <td>{{ $voucher->start_date->format('d/m/Y') }}</td>
                                    <td>{{ $voucher->end_date->format('d/m/Y') }}</td>
                                    <td>
                                        @if($voucher->is_active)
                                            <span class="badge bg-success">Hoạt động</span>
                                        @else
                                            <span class="badge bg-secondary">Vô hiệu</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.vouchers.show', $voucher) }}" 
                                               class="btn btn-sm btn-outline-info" 
                                               title="Xem chi tiết">
                                                <iconify-icon icon="solar:eye-broken"></iconify-icon>
                                            </a>
                                            <a href="{{ route('admin.vouchers.edit', $voucher) }}" 
                                               class="btn btn-sm btn-outline-warning" 
                                               title="Chỉnh sửa">
                                                <iconify-icon icon="solar:pen-broken"></iconify-icon>
                                            </a>
                                            <form action="{{ route('admin.vouchers.toggle-status', $voucher) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-outline-{{ $voucher->is_active ? 'warning' : 'success' }}" 
                                                        title="{{ $voucher->is_active ? 'Vô hiệu hóa' : 'Kích hoạt' }}"
                                                        onclick="return confirm('Bạn có chắc muốn {{ $voucher->is_active ? 'vô hiệu hóa' : 'kích hoạt' }} voucher này?')">
                                                    <iconify-icon icon="solar:{{ $voucher->is_active ? 'power-broken' : 'check-circle-broken' }}"></iconify-icon>
                                                </button>
                                            </form>
                                            @if($voucher->used_count > 0)
                                                <form action="{{ route('admin.vouchers.reset-usage', $voucher) }}" 
                                                      method="POST" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" 
                                                            class="btn btn-sm btn-outline-secondary" 
                                                            title="Reset số lần sử dụng"
                                                            onclick="return confirm('Bạn có chắc muốn reset số lần sử dụng voucher này?')">
                                                        <iconify-icon icon="solar:refresh-broken"></iconify-icon>
                                                    </button>
                                                </form>
                                            @endif
                                            @if($voucher->used_count == 0)
                                                <form action="{{ route('admin.vouchers.destroy', $voucher) }}" 
                                                      method="POST" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-sm btn-outline-danger" 
                                                            title="Xóa voucher"
                                                            onclick="return confirm('Bạn có chắc muốn xóa voucher này?')">
                                                        <iconify-icon icon="solar:trash-bin-broken"></iconify-icon>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center">Không có voucher nào</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $vouchers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
</div>
<!-- End Container Fluid -->
@endsection

@push('scripts')
<script>
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
</script>
@endpush 