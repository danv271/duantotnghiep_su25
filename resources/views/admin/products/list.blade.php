@extends('admin.layouts.app')

@section('title', 'Product List')

@section('content')
<div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Quản lý sản phẩm</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Start Stats Cards -->
    <div class="row">
        <div class="col-md-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Tổng sản phẩm</h5>
                            <h2 class="mb-0">{{$totalProduct}}</h2>
                        </div>
                        <div class="avatar-sm">
                            <a href="{{route('admin.products.list')}}">
                                <span class="avatar-title bg-primary-subtle rounded">
                                    <iconify-icon icon="solar:folder-broken" class="text-primary fs-24"></iconify-icon>
                                </span>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Sản phẩm hết hàng</h5>
                            <h2 class="mb-0">{{$outOfStock}}</h2>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-secondary-subtle rounded">
                                <form action="{{route('admin.products.list')}}" method="get">
                                    <input type="hidden" name="outOfStock" value="hết hàng">
                                    <button class="btn"><iconify-icon icon="solar:folder-broken" class="text-secondary fs-24"></iconify-icon></button>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center gap-1">
                    <h4 class="card-title flex-grow-1">Tất cả sản phẩm</h4>

                    <a href="{{route('admin.products.create')}}" class="btn btn-sm btn-primary">
                        Thêm sản phẩm
                    </a>
                    {{-- <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-sm btn-outline-light" data-bs-toggle="dropdown" aria-expanded="false">
                            This Month
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">Download</a>
                            <a href="javascript:void(0);" class="dropdown-item">Export</a>
                            <a href="javascript:void(0);" class="dropdown-item">Import</a>
                        </div>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0 table-hover table-centered">
                            <thead class="bg-light-subtle">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check ms-1">
                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                            <label class="form-check-label" for="customCheck1"></label>
                                        </div>
                                    </th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá tiền</th>
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
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.products.detail',$product->id) }}" class="btn btn-light btn-sm">
                                                <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-soft-primary btn-sm">
                                                <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <a href="{{ route('admin.products.delete',$product->id) }}" class="btn btn-soft-danger btn-sm">
                                                <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer border-top">
                    {{ $products->links() }}
                    {{-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                     
                        </ul>
                    </nav> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
