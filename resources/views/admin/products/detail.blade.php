@extends('admin.layouts.app')

@section('title', 'Chi Tiết Sản Phẩm | Larkon - Responsive Admin Dashboard Template')

@section('page-title', 'Chi Tiết Sản Phẩm')

@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                        <h4 class="card-title">Chi Tiết Sản Phẩm</h4>
                        <div class="d-flex">
                            <a href="{{ route('admin.products-list') }}" class="btn btn-sm btn-secondary">
                                Quay Lại
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                        </div>
                        <div class="row">
                            <!-- Hình ảnh sản phẩm -->
                            <div class="col-md-6">
                                <div class="featured-dropzone" id="featured-dropzone" data-plugin="dropzone">
                                    {{-- <div class="dz-preview">
                                        <div class="dz-image">
                                            @foreach ($product->images as $image)
                                                @if ($image->is_featured==1)
                                                    <img src="{{  asset('storage/' . $image->path) }}" alt="Product Image" style="width: 100%; height: auto;">
                                                @endif
                                            @endforeach
                                            
                                        </div>
                                    </div> --}}
                                    <div id="carouselExampleIndicators" class="carousel slide">
                                {{-- <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div> --}}
                                <div class="carousel-inner">
                                    @foreach ($product->images as $image)
                                        @if ($image->is_featured==1)
                                            <div class="carousel-item active">
                                                <img src="{{  asset('storage/' . $image->path) }}" class="d-block" height="287px" alt="...">
                                            </div>
                                        @endif
                                        @if ($image->is_featured != 1)
                                            <div class="carousel-item">
                                                <img src="{{  asset('storage/' . $image->path) }}" class="d-block w-100" alt="...">
                                            </div>
                                        @endif
                                    @endforeach
                                    {{-- <div class="carousel-item active">
                                    <img src="..." class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="..." class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="..." class="d-block w-100" alt="...">
                                    </div> --}}
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                                </div>
                                <div class="d-flex gap-2 mt-3">
                                    {{-- @foreach ($product->images as $image)
                                        @if ($image->is_featured!=1)
                                        
                                            <div class="dz-preview">
                                                <div class="dz-image">
                                                    <img src="{{  asset('storage/' . $image->path) }}" alt="Thumbnail 1" style="width: 100px; height: 100px;">
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach --}}
                                    
                                    {{-- <div class="dz-preview">
                                        <div class="dz-image">
                                            <img src="https://via.placeholder.com/100" alt="Thumbnail 2" style="width: 100px; height: 100px;">
                                        </div>
                                    </div>
                                    <div class="dz-preview">
                                        <div class="dz-image">
                                            <img src="https://via.placeholder.com/100" alt="Thumbnail 3" style="width: 100px; height: 100px;">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <!-- Thông tin sản phẩm -->
                            <div class="col-md-6 lh-lg">
                                <h4 class="mb-2">{{$product->name}}</h4>
                                <div class="mb-2">
                                    <span class="text-muted">{{$product->category->category_name}}</span>
                                </div>
                                <h3 class="mb-2">
                                    {{ $priceRange["min"]}} - {{ $priceRange["max"]}}
                                </h3>
                                <div class="d-flex gap-2 mt-3">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal">
                                        Sửa sản phẩm
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#editProductModal">
                                        Xóa sản phẩm
                                    </button>
                                </div>
                                <!-- Biến thể -->
                                {{-- <div class="mb-3">
                                    <label class="form-label">COLOR</label>
                                    <div class="d-flex gap-2">
                                        
                                        <button class="btn btn-outline-secondary btn-sm rounded-circle" style="background-color: #ADD8E6; border: none;"></button> <!-- Light Blue -->
                                        <button class="btn btn-outline-secondary btn-sm rounded-circle" style="background-color: #FFA500; border: none;" disabled></button> <!-- Orange -->
                                        <button class="btn btn-outline-secondary btn-sm rounded-circle" style="background-color: #90EE90; border: none;"></button> <!-- Light Green -->
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SIZE</label>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-outline-secondary btn-sm" disabled>M</button>
                                        <button class="btn btn-outline-secondary btn-sm active">L</button>
                                        <button class="btn btn-outline-secondary btn-sm">XL</button>
                                        <button class="btn btn-outline-secondary btn-sm">XXL</button>
                                        <button class="btn btn-outline-secondary btn-sm" id="clear-size">CLEAR</button>
                                    </div>
                                </div>
                                <p class="mb-3"><strong>$31.00</strong> | Availability: 16 in stock</p> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
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
                                            <th>Phiên bản</th>
                                            <th>Giá tiền</th>
                                            <th>Số lượng</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->variants as $variant)
                                            <tr>
                                                <td>
                                                    <div class="form-check ms-1">
                                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label" for="customCheck2"> </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div>
                                                            <p class="text-muted mb-0 mt-1 fs-13">
                                                                <span>
                                                                    @forEach($variant->attributesValue as $value)
                                                                    {{$value->value}}
                                                                    @endforeach
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{$variant->price}}</td>
                                                <td>
                                                    
                                                    
                                                    <p class="mb-1 text-muted"><span class="text-dark fw-medium">{{$variant->stock_quantity}}</span> còn lại</p>
                                                        
                                                    <p class="mb-0 text-muted">0 đã bán</p>
                                                </td>
                                                <td>
                                                    @if ($variant->stock_quantity>0)
                                                        còn hàng
                                                    @endif
                                                    @if ($variant->stock_quantity==0)
                                                        hết hàng
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button type="button" class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" data-bs-target="#editVariantModal{{$variant->id}}">
                                                            <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                        </button>
                                                        <form action="{{ route('admin.products.variant-delete',$variant->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xoá?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-soft-danger btn-sm" type="submit"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr> 
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" data-bs-target="#addVariantModal">
                                thêm biến thể
                            </button>
                        </div>
                         @foreach ($product->variants as $variant)
                            <!-- Modal for Editing Variant -->
                            <div class="modal fade" id="editVariantModal{{$variant->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editProductModalLabel">Sửa Sản Phẩm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('admin.products.variant-update',$variant->id)}}" method="POST" id="edit-variant-form">
                                                @csrf
                                                @method('PUT')
                                                <!-- Biến Thể -->
                                                <h5 class="mb-3">Biến Thể</h5>
                                                <div id="edit-variants-container">
                                                    <!-- Biến Thể 1 -->
                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                    <div class="variant-row mb-3 border p-3 rounded position-relative">
                                                        <div class="row">
                                                            <div class="col-md-4 mb-3">
                                                                <label class="form-label">Giá</label>
                                                                <input type="number" name="price" class="form-control" value="{{$variant->price}}" required>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label class="form-label">Số Lượng</label>
                                                                <input type="number" name="quantity" class="form-control" value="{{$variant->stock_quantity}}" required>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label class="form-label">Trạng Thái</label>
                                                                <select class="form-select" name="status" required>
                                                                    <option value="active" selected>Kích Hoạt</option>
                                                                    <option value="inactive">Không Kích Hoạt</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="edit-variant-attributes">
                                                            @forEach($variant->attributesValue as $index => $variantAttributes)
                                                                <div class="edit-variant-attribute-row mb-3 border p-2 rounded position-relative">
                                                                    @if ($index > 0)
                                                                        <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                                                    @endif
                                                                    <div class="row">
                                                                        <div class="col-md-5 mb-3">
                                                                            <label class="form-label">Thuộc Tính</label>
                                                                            <select class="form-select" name="attributes[]">
                                                                                <option value="">Chọn thuộc tính</option>
                                                                                @foreach($attributes as $attributeOption)
                                                                                    <option value="{{ $variantAttributes->id }}" {{$variantAttributes->attribute_id == $attributeOption->id ? 'selected' : ''}}>
                                                                                        {{ $attributeOption->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-5 mb-3">
                                                                            <label class="form-label">Giá Trị</label>
                                                                            <select class="form-select" name="attribute_value[]">
                                                                                <option value="">Chọn giá trị</option>
                                                                                @foreach($attributeValues as $value)
                                                                                        <option value="{{ $value->attribute_value_id }}" {{$variantAttributes->id == $value->attribute_value_id ? 'selected' : ''}}>
                                                                                            {{ $value->value }}
                                                                                        </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <span class="edit-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block" data-variant-index="0">Thêm</span>
                                                    </div>
                                                </div>
                                                <div class="text-end mt-4">
                                                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                                                    <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal">Hủy</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Modal for Add Variant -->
                        <div class="modal fade" id="addVariantModal" aria-labelledby="addVariantModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editProductModalLabel">Thêm biến thể</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.products.variant-add') }}" method="POST" id="add-product-form" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{$product->id}}" name="productID">
                                            <!-- Biến Thể -->
                                            <h5 class="mb-3">Biến Thể</h5>
                                            <div id="add-variants-container">
                                                <!-- Biến Thể 1 -->
                                                <div class="variant-row mb-3 border p-3 rounded position-relative">
                                                    <span class="remove-variant-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                                    <div class="row">
                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Giá</label>
                                                            <input type="number" name="variants[0][price]" class="form-control">
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Số Lượng</label>
                                                            <input type="number" name="variants[0][quantity]" class="form-control">
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Trạng Thái</label>
                                                            <select class="form-select" name="variants[0][status]">
                                                                <option value="active" selected>Kích Hoạt</option>
                                                                <option value="inactive">Không Kích Hoạt</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="add-variant-attributes-0">
                                                        <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                                            <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                                            <div class="row">
                                                                <div class="col-md-5 mb-3">
                                                                    <label class="form-label">Thuộc Tính</label>
                                                                    <select class="form-select" name="variants[0][attributes][]">
                                                                        <option value="">Chọn thuộc tính</option>
                                                                        @forEach($attributes as $attribute)
                                                                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-5 mb-3">
                                                                    <label class="form-label">Giá Trị</label>
                                                                    <select class="form-select" name="variants[0][attribute_value_id][]">
                                                                        <option value="">Chọn giá trị</option>
                                                                        @forEach($attributeValues as $attributeOption)
                                                                            <option value="{{ $attributeOption->attribute_value_id }}">{{ $attributeOption->value }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="add-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block" data-variant-index="0">Thêm</span>
                                                </div>
                                            </div>
                                            <button type="button" id="add-variant-btn" class="btn add-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block">Thêm Biến Thể</button>

                                            <div class="text-end mt-4">
                                                <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                                                <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal">Hủy</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h4>Mô tả sản phẩm</h3>
                            <p class="mb-3">
                                {{ $product->description }}
                            </p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Product -->
<div class="modal fade" id="editProductModal" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Sửa Sản Phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.products-update', $product->id)}}" method="POST" id="edit-product-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Thông Tin Cơ Bản -->
                    <h5 class="mb-3">Thông Tin Cơ Bản</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="edit-product-name" class="form-label">Tên Sản Phẩm</label>
                            <input type="text" id="edit-product-name" name="name" class="form-control" value="{{$product->name}}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit-product-base-price" class="form-label">Giá Cơ Bản</label>
                            <input type="number" id="edit-product-base-price" name="base_price" class="form-control" value="{{$product->base_price}}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit-product-category" class="form-label">Danh Mục</label>
                            <select class="form-select" id="edit-product-category" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$product->category->id == $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="edit-product-description" class="form-label">Mô Tả</label>
                            <textarea id="edit-product-description" name="description" class="form-control" rows="20">{{$product->description}}</textarea>
                        </div>
                    </div>

                    <!-- Hình Ảnh Nổi Bật -->
                    <h5 class="mb-3">Hình Ảnh Nổi Bật</h5>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Tải Lên Hình Ảnh Nổi Bật</label>
                            <div class="dropzone featured-dropzone" id="edit-featured-dropzone" data-plugin="dropzone">
                                <div class="dz-preview">
                                    <div class="dz-image">
                                        @foreach($product->images as $image)
                                            @if($image->is_featured == 1)
                                                <img src="{{asset('storage/'.$image->path)}}" alt="Featured Image" style="width:300px;">
                                            @endif
                                        @endforeach
                                    </div>
                                    <input type="file" id="edit-featured-image-upload" name="featured_image" accept="image/*" style="display: none;">
                                    <a class="dz-remove" href="javascript:void(0);" onclick="document.getElementById('edit-featured-image-upload').click();">Thay đổi</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hình Ảnh Sản Phẩm -->
                    <h5 class="mb-3">Hình Ảnh Sản Phẩm</h5>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Tải Lên Hình Ảnh Bổ Sung</label>
                            <div class="dropzone" id="edit-images-dropzone" data-plugin="dropzone">
                                <div class="d-flex row" id="existing-images">
                                    @foreach($product->images as $image)
                                        @if($image->is_featured != 1)
                                            <div class="dz-preview col-3 m-0" data-image-id="{{$image->id}}">
                                                <div class="dz-image">
                                                    <img src="{{asset('storage/'.$image->path)}}" alt="Product Image" width="100%">
                                                </div>
                                                <a class="dz-remove" href="javascript:void(0);" onclick="removeImage({{$image->id}}, this)">Xóa</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <input type="file" id="edit-images-upload" name="images[]" accept="image/*" multiple style="display: none;">
                            <button type="button" class="btn btn-primary mt-2" onclick="document.getElementById('edit-images-upload').click();">Thêm Ảnh</button>
                            <input type="hidden" name="deleted_images" id="deleted-images" value="">
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                        <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
    <style>
        .featured-dropzone {
            min-height: 200px;
            max-width: 100%;
            padding: 20px;
            border: 2px dashed #007bff;
            border-radius: 8px;
            background-color: #f8f9fa;
            text-align: center;
        }
        .featured-dropzone .dz-preview, .dropzone .dz-preview {
            margin: 0 auto;
        }
        .featured-dropzone .dz-image, .dropzone .dz-image {
            width: 100% !important;
            height: auto !important;
            border-radius: 8px;
        }
        .featured-dropzone .dz-remove, .dropzone .dz-remove {
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }
        .variant-row, .variant-attribute-row {
            position: relative;
        }
        .remove-variant-text, .remove-variant-attribute-text {
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            color: #dc3545;
        }
        .remove-variant-text:hover, .remove-variant-attribute-text:hover {
            color: #c82333;
            text-decoration: underline;
        }
        .add-variant-attribute-btn {
            font-size: 0.875rem;
            font-weight: 500;
            color: #007bff;
            cursor: pointer;
        }
        .add-variant-attribute-btn:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        @media (max-width: 576px) {
            .remove-variant-text, .remove-variant-attribute-text {
                font-size: 0.75rem;
                margin-top: 8px !important;
                margin-right: 8px !important;
            }
            .add-variant-attribute-btn {
                font-size: 0.75rem;
            }
        }
        .form-control-static {
            padding: 0.375rem 0.75rem;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }
    </style>
@endsection

@section('scripts')
    {{-- <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet"> --}}

    <script>
        let variantIndex = 1;
        // Xử lý thay đổi ảnh nổi bật
    document.getElementById('edit-featured-image-upload').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.querySelector('#edit-featured-dropzone .dz-image img');
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Xử lý thêm ảnh sản phẩm
    document.getElementById('edit-images-upload').addEventListener('change', function(e) {
        const files = e.target.files;
        const previewContainer = document.getElementById('existing-images');
        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'dz-preview col-3 m-0';
                div.innerHTML = `
                    <div class="dz-image">
                        <img src="${e.target.result}" alt="Product Image" width="100%">
                    </div>
                    <a class="dz-remove" href="javascript:void(0);" onclick="this.parentElement.remove()">Xóa</a>
                `;
                previewContainer.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    });

    // Xử lý xóa ảnh sản phẩm
    function removeImage(imageId, element) {
        // Thêm ID ảnh vào input hidden để gửi lên server
        const deletedImagesInput = document.getElementById('deleted-images');
        let deletedImages = deletedImagesInput.value ? deletedImagesInput.value.split(',') : [];
        deletedImages.push(imageId);
        deletedImagesInput.value = deletedImages.join(',');
        
        // Xóa ảnh khỏi giao diện
        element.parentElement.remove();
    }
        // Initialize Featured Image Dropzone for Edit Modal
        // new Dropzone('#edit-featured-dropzone', {
        //     url: '#',
        //     maxFiles: 1,
        //     acceptedFiles: 'image/jpeg,image/png,image/gif',
        //     autoProcessQueue: false,
        //     addRemoveLinks: true,
        //     dictDefaultMessage: 'Kéo và thả một hình ảnh nổi bật tại đây, hoặc nhấn để duyệt',
        //     init: function() {
        //         this.on('addedfile', function(file) {
        //             if (this.files.length > 1) {
        //                 this.removeFile(this.files[0]);
        //             }
        //             document.getElementById('edit-featured-image-input').value = file.name;
        //         });
        //         this.on('removedfile', function() {
        //             document.getElementById('edit-featured-image-input').value = '';
        //         });
        //     }
        // });

        // // Initialize Product Images Dropzone for Edit Modal
        // new Dropzone('#edit-images-dropzone', {
        //     url: '#',
        //     maxFilesize: 5,
        //     acceptedFiles: 'image/jpeg,image/png,image/gif',
        //     autoProcessQueue: false,
        //     addRemoveLinks: true,
        //     dictDefaultMessage: 'Kéo và thả hình ảnh bổ sung tại đây, hoặc nhấn để duyệt',
        //     init: function() {
        //         this.on('addedfile', function(file) {
        //             let input = document.getElementById('edit-images-input');
        //             let files = input.value ? input.value.split(',') : [];
        //             files.push(file.name);
        //             input.value = files.join(',');
        //         });
        //         this.on('removedfile', function(file) {
        //             let input = document.getElementById('edit-images-input');
        //             let files = input.value.split(',');
        //             const index = files.indexOf(file.name);
        //             if (index > -1) files.splice(index, 1);
        //             input.value = files.join(',');
        //         });
        //     }
        // });

        // Thêm hàng biến thể mới
        document.getElementById('add-variant-btn').addEventListener('click', function() {
            const container = document.getElementById(`add-variants-container`);
            const row = document.createElement('div');
            row.className = 'variant-row mb-3 border p-3 rounded position-relative';
            row.innerHTML = `
                <span class="remove-variant-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Giá</label>
                        <input type="number" name="variants[${variantIndex}][price]" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Số Lượng</label>
                        <input type="number" name="variants[${variantIndex}][quantity]" class="form-control" >
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Trạng Thái</label>
                        <select class="form-select" name="variants[${variantIndex}][status]" required>
                            <option value="active">Kích Hoạt</option>
                            <option value="inactive">Không Kích Hoạt</option>
                        </select>
                    </div>
                </div>
                <div id="add-variant-attributes-${variantIndex}">
                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                        <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Thuộc Tính</label>
                                <select class="form-select" name="variants[${variantIndex}][attributes][]">
                                    <option value="">Chọn thuộc tính</option>
                                    @forEach($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Giá Trị</label>
                                <select class="form-select" name="variants[${variantIndex}][attribute_value_id][]">
                                    <option value="">Chọn giá trị</option>
                                    @forEach($attributeValues as $attributeOption)
                                        <option value="{{ $attributeOption->attribute_value_id }}">{{ $attributeOption->value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="add-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block" data-variant-index="${variantIndex}">Thêm</span>
            `;
            container.appendChild(row);
            variantIndex++;
        });

        // Xóa hàng biến thể
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-variant-text')) {
                const rows = document.querySelectorAll('#edit-variants-container .variant-row');
                if (rows.length > 1) {
                    e.target.closest('.variant-row').remove();
                } else {
                    alert('Cần ít nhất một biến thể.');
                }
            }
        });

        // Thêm hàng thuộc tính biến thể mới
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-variant-attribute-btn')) {
                const variantIndex = e.target.getAttribute('data-variant-index');
                const container = document.getElementById( `add-variant-attributes-${variantIndex}`);
                const row = document.createElement('div');
                row.className = 'variant-attribute-row mb-3 border p-2 rounded position-relative';
                row.innerHTML = `
                    <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Thuộc Tính</label>
                            <select class="form-select" name="variants[${variantIndex}][attributes][]">
                                <option value="">chọn giá trị</option>
                                 @foreach($attributes as $attributeOption)
                                        <option value="{{ $attributeOption->id }}">
                                            {{ $attributeOption->name }}
                                        </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Giá Trị</label>
                            <select class="form-select" name="variants[${variantIndex}][attribute_value_id][]">
                                <option value="">chọn giá trị</option>
                                @foreach($attributeValues as $value)
                                        <option value="{{$value->attribute_value_id}}">
                                            {{ $value->value }}
                                        </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                `;
                container.appendChild(row);
            }
        });

         // Thêm hàng thuộc tính biến thể mới cho modal sửa
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('edit-variant-attribute-btn')) {
                const container = document.getElementById(`edit-variant-attributes`);
                const row = document.createElement('div');
                const count = container.querySelectorAll('.edit-variant-attribute-row').length;
                row.className = 'edit-variant-attribute-row mb-3 border p-2 rounded position-relative';
                row.innerHTML = `
                    <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Thuộc Tính</label>
                            <select class="form-select" name="attributes[]">
                                <option value="">Chọn thuộc tính</option>
                                @foreach($attributes as $attributeOption)
                                        <option value="{{ $attributeOption->id }}">
                                            {{ $attributeOption->name }}
                                        </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Giá Trị</label>
                            <select class="form-select" name="attribute_value[]">
                                <option value="">Chọn giá trị</option>
                                @foreach($attributeValues as $value)
                                        <option value="{{$value->attribute_value_id}}">
                                            {{ $value->value }}
                                        </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                `;
                container.appendChild(row);
            }
        });

        // Xóa hàng thuộc tính biến thể
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-variant-attribute-text')) {
                const rows = e.target.closest('.variant-attribute-row').parentElement.children;
                if (rows.length > 1) {
                    e.target.closest('.variant-attribute-row').remove();
                } else {
                    alert('Cần ít nhất một thuộc tính cho biến thể này.');
                }
            }
        });
         // Xóa hàng thuộc tính biến thể sửa
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-variant-attribute-text')) {
                const rows = e.target.closest('.edit-variant-attribute-row').parentElement.children;
                if (rows.length > 1) {
                    e.target.closest('.edit-variant-attribute-row').remove();
                } else {
                    alert('Cần ít nhất một thuộc tính cho biến thể này.');
                }
            }
        });
    </script>
@endsection