@extends('admin.layouts.app')

@section('title', 'Trashed Categories')

@section('content')
<!-- Start Container Fluid -->
<div class="container-xxl">
    <!-- Start Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Sản phẩm bị xóa</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Sản phẩm</a></li>
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
                    <h4 class="card-title mb-0">Sản phẩm bị xóa</h4>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.products.list') }}" class="btn btn-secondary">
                            <iconify-icon icon="solar:arrow-left-broken" class="align-middle me-1"></iconify-icon>
                            Danh sách sản phẩm
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
                    @if($products->count() > 0)
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
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Danh mục</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <div class="form-check ms-1">
                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                <label class="form-check-label" for="customCheck2"> </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                    @foreach ($product->images as $image)
                                                        @if ($image->is_featured==1)
                                                            <img src="{{  asset('storage/' . $image->path) }}" alt="" class="avatar-md">
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div>
                                                    <a href="{{ url('product-details') }}" class="text-dark fw-medium fs-15">{{$product->name}}</a>
                                                    <p class="text-muted mb-0 mt-1 fs-13">
                                                        @php
                                                        $totalVariant=0;
                                                        foreach ($product->variants as $variant){
                                                            $totalVariant+=1;
                                                        }
                                                        @endphp
                                                        <span>{{$totalVariant}} biến thể</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{number_format($product->base_price,0,',','.')}}</td>
                                        <td>
                                            @php
                                                $index = 0;
                                                foreach ($product->variants as $variant) {
                                                    if($variant->stock_quantity==0){
                                                        $index = 0;
                                                    }
                                                    $index+=$variant->stock_quantity;
                                                }
                                            @endphp
                                            @if($index!=0)
                                                <p class="mb-1 text-muted"><span class="text-dark fw-medium">{{ $index }}</span> còn lại</p>
                                            @endif
                                            @if($index==0)
                                                <span class="badge bg-{{ $index != 0 ? 'success' : 'danger' }}-subtle text-{{ $index != 0 ? 'success' : 'danger' }}">
                                                    {{ $index != 0 ? 'còn hàng' : 'hết hàng' }}
                                                </span>
                                            @endif
                                            {{-- <p class="mb-0 text-muted">0 đã bán</p> --}}
                                        </td>
                                        <td>{{$product->category->category_name}}</td>
                                        <td>
                                            {{-- <div class="d-flex gap-2">
                                                <a href="{{ route('admin.products.detail',$product->id) }}" class="btn btn-light btn-sm">
                                                    <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                                </a>
                                                <a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-soft-primary btn-sm">
                                                    <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                </a>
                                                <a href="{{ route('admin.products.delete',$product->id) }}" class="btn btn-soft-danger btn-sm">
                                                    <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            </div> --}}
                                            <div class="d-flex gap-2">
                                                <form action="{{route('admin.products.restore',$product->id)}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-soft-success btn-sm" data-bs-toggle="tooltip" title="Khôi phục">
                                                        <iconify-icon icon="solar:refresh-broken" class="align-middle fs-18"></iconify-icon>
                                                    </button>
                                                </form>
                                                <form action="" method="POST" class="d-inline">
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
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="avatar-lg mx-auto mb-4">
                                <span class="avatar-title bg-light-subtle rounded-circle">
                                    <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="text-muted fs-48"></iconify-icon>
                                </span>
                            </div>
                            <h4 class="text-muted mb-3">Không có sản phẩm nào bị xóa</h4>
                            <p class="text-muted mb-4">Không có sản phẩm nào trong thùng rác. Các sản phẩm đã xóa sẽ xuất hiện ở đây.</p>
                            <a href="{{ route('admin.products.list') }}" class="btn btn-primary">
                                <iconify-icon icon="solar:arrow-left-broken" class="align-middle me-1"></iconify-icon>
                                Quay lại sản phẩm
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