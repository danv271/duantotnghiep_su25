@extends('admin.layouts.app')

@section('title', 'Tạo Voucher Mới')

@section('content')
<!-- Start Container Fluid -->
<div class="container-xxl">
    <!-- Start Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Tạo Voucher Mới</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.vouchers.index') }}">Voucher</a></li>
                        <li class="breadcrumb-item active">Tạo mới</li>
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
                    <h4 class="card-title">Thông tin Voucher</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.vouchers.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="code" class="form-label">Mã Voucher <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" 
                                               class="form-control @error('code') is-invalid @enderror" 
                                               id="code" 
                                               name="code" 
                                               value="{{ old('code') }}" 
                                               placeholder="Nhập mã voucher hoặc để trống để tự động tạo">
                                        <button type="button" 
                                                class="btn btn-outline-secondary" 
                                                id="generateCode">
                                            <iconify-icon icon="solar:refresh-broken"></iconify-icon>
                                            Tạo mã
                                        </button>
                                    </div>
                                    @error('code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Mã voucher sẽ được chuyển thành chữ hoa</small>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên Voucher <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           placeholder="Nhập tên voucher">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="3" 
                                      placeholder="Mô tả voucher">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Loại Voucher <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type') is-invalid @enderror" 
                                            id="type" 
                                            name="type">
                                        <option value="">Chọn loại voucher</option>
                                        <option value="shipping" {{ old('type') == 'shipping' ? 'selected' : '' }}>
                                            Miễn phí vận chuyển
                                        </option>
                                        <option value="product" {{ old('type') == 'product' ? 'selected' : '' }}>
                                            Giảm giá sản phẩm
                                        </option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="discount_value" class="form-label">Giá trị giảm <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" 
                                               class="form-control @error('discount_value') is-invalid @enderror" 
                                               id="discount_value" 
                                               name="discount_value" 
                                               value="{{ old('discount_value') }}" 
                                               min="0" 
                                               step="0.01" 
                                               placeholder="Nhập giá trị giảm">
                                        <select class="form-select" id="discount_type" name="discount_type" style="max-width: 80px;">
                                            <option value="fixed" {{ old('discount_type', 'fixed') == 'fixed' ? 'selected' : '' }}>đ</option>
                                            <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>%</option>
                                        </select>
                                    </div>
                                    @error('discount_value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        <span id="discount_help">Chọn loại giảm giá và nhập giá trị</span>
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="min_order_amount" class="form-label">Đơn hàng tối thiểu</label>
                                    <input type="number" 
                                           class="form-control @error('min_order_amount') is-invalid @enderror" 
                                           id="min_order_amount" 
                                           name="min_order_amount" 
                                           value="{{ old('min_order_amount') }}" 
                                           min="0" 
                                           step="1000" 
                                           placeholder="Nhập giá trị đơn hàng tối thiểu">
                                    @error('min_order_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Để trống nếu không có yêu cầu</small>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="max_usage" class="form-label">Số lần sử dụng tối đa</label>
                                    <input type="number" 
                                           class="form-control @error('max_usage') is-invalid @enderror" 
                                           id="max_usage" 
                                           name="max_usage" 
                                           value="{{ old('max_usage') }}" 
                                           min="1" 
                                           placeholder="Nhập số lần sử dụng tối đa">
                                    @error('max_usage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Để trống nếu không giới hạn</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Ngày bắt đầu <span class="text-danger">*</span></label>
                                    <input type="date" 
                                           class="form-control @error('start_date') is-invalid @enderror" 
                                           id="start_date" 
                                           name="start_date" 
                                           value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">Ngày kết thúc <span class="text-danger">*</span></label>
                                    <input type="date" 
                                           class="form-control @error('end_date') is-invalid @enderror" 
                                           id="end_date" 
                                           name="end_date" 
                                           value="{{ old('end_date') }}">
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" 
                                       class="form-check-input @error('is_active') is-invalid @enderror" 
                                       id="is_active" 
                                       name="is_active" 
                                       value="1" 
                                       {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Kích hoạt voucher ngay
                                </label>
                                @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.vouchers.index') }}" class="btn btn-secondary">
                                <iconify-icon icon="solar:arrow-left-broken" class="me-1"></iconify-icon>
                                Hủy
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <iconify-icon icon="solar:check-circle-broken" class="me-1"></iconify-icon>
                                Tạo Voucher
                            </button>
                        </div>
                    </form>
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
document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.getElementById('type');
    const discountValue = document.getElementById('discount_value');
    const discountType = document.getElementById('discount_type');
    const discountHelp = document.getElementById('discount_help');
    const generateCodeBtn = document.getElementById('generateCode');
    const codeInput = document.getElementById('code');

    // Handle voucher type change
    typeSelect.addEventListener('change', function() {
        if (this.value === 'product') {
            // Cho phép chọn % hoặc đ cho product voucher
            discountType.style.display = 'block';
            discountHelp.textContent = 'Chọn loại giảm giá (% hoặc đ) và nhập giá trị';
            discountValue.placeholder = 'Nhập giá trị giảm';
        } else if (this.value === 'shipping') {
            // Chỉ cho phép đ cho shipping voucher
            discountType.value = 'fixed';
            discountType.style.display = 'none';
            discountHelp.textContent = 'Nhập số tiền giảm phí ship (VD: 30000)';
            discountValue.placeholder = 'Nhập số tiền giảm phí ship';
        }
    });

    // Handle discount type change
    discountType.addEventListener('change', function() {
        if (this.value === 'percentage') {
            discountHelp.textContent = 'Nhập phần trăm giảm (VD: 10 cho 10%)';
            discountValue.placeholder = 'Nhập phần trăm giảm';
            discountValue.step = '0.1';
            discountValue.max = '100';
        } else {
            discountHelp.textContent = 'Nhập số tiền giảm cố định (VD: 50000)';
            discountValue.placeholder = 'Nhập số tiền giảm';
            discountValue.step = '1000';
            discountValue.max = '';
        }
    });

    // Initialize based on current values
    if (typeSelect.value === 'product') {
        discountType.style.display = 'block';
        if (discountType.value === 'percentage') {
            discountHelp.textContent = 'Nhập phần trăm giảm (VD: 10 cho 10%)';
            discountValue.placeholder = 'Nhập phần trăm giảm';
            discountValue.step = '0.1';
            discountValue.max = '100';
        } else {
            discountHelp.textContent = 'Nhập số tiền giảm cố định (VD: 50000)';
            discountValue.placeholder = 'Nhập số tiền giảm';
            discountValue.step = '1000';
        }
    } else if (typeSelect.value === 'shipping') {
        discountType.style.display = 'none';
        discountHelp.textContent = 'Nhập số tiền giảm phí ship (VD: 30000)';
        discountValue.placeholder = 'Nhập số tiền giảm phí ship';
    }

    // Generate voucher code
    generateCodeBtn.addEventListener('click', function() {
        fetch('{{ route("admin.vouchers.generate-code") }}')
            .then(response => response.json())
            .then(data => {
                codeInput.value = data.code;
            })
            .catch(error => {
                console.error('Error generating code:', error);
            });
    });

    // Set default dates
    const today = new Date().toISOString().split('T')[0];
    const endDate = new Date();
    endDate.setDate(endDate.getDate() + 30);
    const endDateStr = endDate.toISOString().split('T')[0];

    if (!document.getElementById('start_date').value) {
        document.getElementById('start_date').value = today;
    }
    if (!document.getElementById('end_date').value) {
        document.getElementById('end_date').value = endDateStr;
    }
});
</script>
@endpush 