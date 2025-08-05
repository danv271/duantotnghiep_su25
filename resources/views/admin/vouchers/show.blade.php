@extends('admin.layouts.app')

@section('title', 'Chi tiết Voucher')

@section('content')
<!-- Start Container Fluid -->
<div class="container-xxl">
    <!-- Start Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Chi tiết Voucher</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.vouchers.index') }}">Voucher</a></li>
                        <li class="breadcrumb-item active">Chi tiết</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Start Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Thông tin Voucher</h4>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.vouchers.edit', $voucher) }}" class="btn btn-warning">
                                <iconify-icon icon="solar:pen-broken" class="me-1"></iconify-icon>
                                Chỉnh sửa
                            </a>
                            <a href="{{ route('admin.vouchers.index') }}" class="btn btn-secondary">
                                <iconify-icon icon="solar:arrow-left-broken" class="me-1"></iconify-icon>
                                Quay lại
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Mã Voucher</label>
                                        <div class="p-2 bg-light rounded">
                                            <span class="badge bg-primary fs-6">{{ $voucher->code }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Tên Voucher</label>
                                        <div class="p-2 bg-light rounded">
                                            {{ $voucher->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Mô tả</label>
                                <div class="p-2 bg-light rounded">
                                    {{ $voucher->description ?: 'Không có mô tả' }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Loại Voucher</label>
                                        <div class="p-2 bg-light rounded">
                                            @if($voucher->type === 'shipping')
                                                <span class="badge bg-info">Miễn phí vận chuyển</span>
                                            @else
                                                <span class="badge bg-success">{{ $voucher->getTypeLabel() }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Giá trị giảm</label>
                                        <div class="p-2 bg-light rounded">
                                            @if($voucher->type === 'product' && $voucher->discount_value < 100)
                                                {{ $voucher->discount_value }}%
                                            @else
                                                {{ number_format($voucher->discount_value) }}đ
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Đơn hàng tối thiểu</label>
                                        <div class="p-2 bg-light rounded">
                                            @if($voucher->min_order_amount)
                                                {{ number_format($voucher->min_order_amount) }}đ
                                            @else
                                                <span class="text-muted">Không giới hạn</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Số lần sử dụng tối đa</label>
                                        <div class="p-2 bg-light rounded">
                                            @if($voucher->max_usage)
                                                {{ $voucher->max_usage }} lần
                                            @else
                                                <span class="text-muted">Không giới hạn</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Ngày bắt đầu</label>
                                        <div class="p-2 bg-light rounded">
                                            {{ $voucher->start_date->format('d/m/Y') }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Ngày kết thúc</label>
                                        <div class="p-2 bg-light rounded">
                                            {{ $voucher->end_date->format('d/m/Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Trạng thái</label>
                                <div class="p-2 bg-light rounded">
                                    @if($voucher->is_active)
                                        <span class="badge bg-success">Hoạt động</span>
                                    @else
                                        <span class="badge bg-secondary">Vô hiệu</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Status Card -->
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h6 class="card-title">Trạng thái Voucher</h6>
                                    
                                    @php
                                        $now = \Carbon\Carbon::now();
                                        $isExpired = $now->greaterThan($voucher->end_date);
                                        $isActive = $voucher->is_active;
                                        $isValid = $voucher->isValid();
                                        $usageLimit = $voucher->max_usage ? $voucher->used_count >= $voucher->max_usage : false;
                                    @endphp

                                    <div class="mb-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="flex-shrink-0">
                                                @if($isExpired)
                                                    <iconify-icon icon="solar:clock-circle-broken" class="text-warning fs-4"></iconify-icon>
                                                @elseif(!$isActive)
                                                    <iconify-icon icon="solar:power-broken" class="text-secondary fs-4"></iconify-icon>
                                                @elseif($usageLimit)
                                                    <iconify-icon icon="solar:close-circle-broken" class="text-danger fs-4"></iconify-icon>
                                                @elseif($isValid)
                                                    <iconify-icon icon="solar:check-circle-broken" class="text-success fs-4"></iconify-icon>
                                                @else
                                                    <iconify-icon icon="solar:close-circle-broken" class="text-danger fs-4"></iconify-icon>
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0">
                                                    @if($isExpired)
                                                        Đã hết hạn
                                                    @elseif(!$isActive)
                                                        Vô hiệu hóa
                                                    @elseif($usageLimit)
                                                        Đã hết lượt sử dụng
                                                    @elseif($isValid)
                                                        Có thể sử dụng
                                                    @else
                                                        Không hợp lệ
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Usage Progress -->
                                    <div class="mb-3">
                                        <label class="form-label">Sử dụng</label>
                                        @if($voucher->max_usage)
                                            @php
                                                $usagePercentage = ($voucher->used_count / $voucher->max_usage) * 100;
                                            @endphp
                                            <div class="progress mb-2" style="height: 8px;">
                                                <div class="progress-bar {{ $usagePercentage >= 100 ? 'bg-danger' : ($usagePercentage >= 80 ? 'bg-warning' : 'bg-success') }}" 
                                                style="width: {{ min($usagePercentage, 100) }}%"></div>
                                            </div>
                                            <small class="text-muted">
                                                {{ $voucher->used_count }}/{{ $voucher->max_usage }} lần
                                            </small>
                                        @else
                                            <div class="progress mb-2" style="height: 8px;">
                                                <div class="progress-bar bg-success" style="width: 100%"></div>
                                            </div>
                                            <small class="text-muted">
                                                {{ $voucher->used_count }} lần (không giới hạn)
                                            </small>
                                        @endif
                                    </div>

                                    <!-- Validity Status -->
                                    <div class="mb-3">
                                        <label class="form-label">Thời gian</label>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">Bắt đầu</small>
                                            <small class="text-muted">{{ $voucher->start_date->format('d/m/Y') }}</small>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">Kết thúc</small>
                                            <small class="text-muted">{{ $voucher->end_date->format('d/m/Y') }}</small>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">Còn lại</small>
                                            <small class="text-muted">
                                                @if($isExpired)
                                                    <span class="text-danger">Đã hết hạn</span>
                                                @else
                                                    {{ $now->diffInDays($voucher->end_date) }} ngày
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="card border-0 bg-light mt-3">
                                <div class="card-body">
                                    <h6 class="card-title">Thao tác nhanh</h6>
                                    
                                    <div class="d-grid gap-2">
                                        <form action="{{ route('admin.vouchers.toggle-status', $voucher) }}" 
                                            method="POST" 
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-{{ $voucher->is_active ? 'warning' : 'success' }} w-100"
                                                    onclick="return confirm('Bạn có chắc muốn {{ $voucher->is_active ? 'vô hiệu hóa' : 'kích hoạt' }} voucher này?')">
                                                <iconify-icon icon="solar:{{ $voucher->is_active ? 'power-broken' : 'check-circle-broken' }}" class="me-1"></iconify-icon>
                                                {{ $voucher->is_active ? 'Vô hiệu hóa' : 'Kích hoạt' }}
                                            </button>
                                        </form>
                                        
                                        @if($voucher->used_count > 0)
                                            <form action="{{ route('admin.vouchers.reset-usage', $voucher) }}" 
                                                method="POST" 
                                                class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-secondary w-100"
                                                        onclick="return confirm('Bạn có chắc muốn reset số lần sử dụng voucher này?')">
                                                    <iconify-icon icon="solar:refresh-broken" class="me-1"></iconify-icon>
                                                    Reset sử dụng
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
                                                        class="btn btn-sm btn-danger w-100"
                                                        onclick="return confirm('Bạn có chắc muốn xóa voucher này?')">
                                                    <iconify-icon icon="solar:trash-bin-broken" class="me-1"></iconify-icon>
                                                    Xóa voucher
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
</div>
<!-- End Container Fluid -->
@endsection 