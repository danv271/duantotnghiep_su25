@extends('admin.layouts.app')

@section('title', 'Chỉnh Sửa Sản Phẩm | Larkon - Responsive Admin Dashboard Template')

@section('page-title', 'Chỉnh Sửa Sản Phẩm')

@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                        <h4 class="card-title">Chỉnh Sửa Sản Phẩm</h4>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/admin/products/1') }}" class="btn btn-sm btn-secondary">
                                Quay Lại
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.products-update', $product->id) }}" method="POST" enctype="multipart/form-data" id="edit-product-form">
                            @csrf
                            @method('PUT')

                            <!-- Thông Tin Cơ Bản -->
                            <h5 class="mb-3">Thông Tin Cơ Bản</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="edit-product-name" class="form-label">Tên Sản Phẩm</label>
                                    <input type="text" id="edit-product-name" name="name" class="form-control" value="{{ $product->name }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="edit-product-base-price" class="form-label">Giá Cơ Bản</label>
                                    <input type="number" id="edit-product-base-price" name="base_price" class="form-control" step="0.01" value="{{ $product->base_price }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="edit-product-category" class="form-label">Danh Mục</label>
                                    <select class="form-select" id="edit-product-category" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="edit-product-description" class="form-label">Mô Tả</label>
                                    <textarea id="edit-product-description" name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
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
                                                <img src="{{ asset('storage/' . $featuredImage) }}" width="100%" alt="Featured Image">
                                            </div>
                                            <a class="dz-remove" href="">Xóa</a>
                                        </div>  
                                    </div>
                                    <input type="hidden" name="featured_image" id="edit-featured-image-input">
                                </div>
                            </div>

                            <!-- Hình Ảnh Sản Phẩm -->
                            <h5 class="mb-3">Hình Ảnh Sản Phẩm</h5>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Tải Lên Hình Ảnh Bổ Sung</label>
                                    <div class="dropzone" id="edit-images-dropzone" data-plugin="dropzone">
                                        <div class="d-flex gap-3">
                                            <div class="dz-preview">
                                                <div class="dz-image">
                                                    <img src="https://via.placeholder.com/150" alt="Product Image 1">
                                                </div>
                                                <a class="dz-remove" href="javascript:undefined;">Xóa</a>
                                            </div>
                                            <div class="dz-preview">
                                                <div class="dz-image">
                                                    <img src="https://via.placeholder.com/150" alt="Product Image 2">
                                                </div>
                                                <a class="dz-remove" href="javascript:undefined;">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="images[]" id="edit-images-input" multiple>
                                </div>
                            </div>
                            
                            <!-- Biến Thể -->
                            <h5 class="mb-3">Biến Thể</h5>
                            <div id="edit-variants-container">
                                <!-- Biến Thể -->
                                @foreach ($product->variants as $index => $variant)
                                    <div class="variant-row mb-3 border p-3 rounded position-relative">
                                        <span class="remove-variant-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Giá</label>
                                                <input type="number" name="variants[{{ $index }}][price]" class="form-control" step="0.01" value="{{ $variant->price }}">
                                            </div>
                                            <input type="hidden" name="variants[{{ $index }}][id]" class="form-control" value="{{ $variant->id ? $variant->id :'' }}">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Số Lượng</label>
                                                <input type="number" name="variants[{{ $index }}][quantity]" class="form-control" value="{{ $variant->stock_quantity }}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Trạng Thái</label>
                                                <select class="form-select" name="variants[{{ $index }}][status]">
                                                    <option value="active" {{ $variant->status == 'active' ? 'selected' : '' }}>Kích Hoạt</option>
                                                    <option value="inactive" {{ $variant->status == 'inactive' ? 'selected' : '' }}>Không Kích Hoạt</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="edit-variant-attributes-{{ $index }}">
                                            @foreach ($variant->attributesValue as $attrIndex => $attribute)
                                                <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                                    <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                                    <div class="row">
                                                        <div class="col-md-5 mb-3">
                                                            <label class="form-label">Thuộc Tính</label>
                                                            <select class="form-select" name="variants[{{ $index }}][attributes][{{ $attrIndex }}][attribute_id]">
                                                                <option value="">Chọn giá trị</option>
                                                                @foreach ($attributes as $attributeOption)
                                                                    <option value="{{ $attributeOption->id }}" {{ $attribute->attribute_id == $attributeOption->id ? 'selected' : '' }}>
                                                                        {{ $attributeOption->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5 mb-3">
                                                            <label class="form-label">Giá Trị</label>
                                                            <select class="form-select" name="variants[{{ $index }}][attributes][{{ $attrIndex }}][attribute_value_id]">
                                                                <option value="">Chọn giá trị</option>
                                                                @foreach ($attributeValues as $value)
                                                                    <option value="{{ $value->id }}" {{ $attribute->id == $value->id ? 'selected' : '' }}>
                                                                        {{ $value->value }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if ($variant->attributesValue->isEmpty())
                                                <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                                    <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                                    <div class="row">
                                                        <div class="col-md-5 mb-3">
                                                            <label class="form-label">Thuộc Tính</label>
                                                            <select class="form-select" name="variants[{{ $index }}][attributes][0][attribute_id]">
                                                                <option value="">Chọn giá trị</option>
                                                                @foreach ($attributeValues as $attributeOption)
                                                                    <option value="{{ $attributeOption->id }}">{{ $attributeOption->value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5 mb-3">
                                                            <label class="form-label">Giá Trị</label>
                                                            <select class="form-select" name="variants[{{ $index }}][attributes][0][attribute_value_id]">
                                                                <option value="">Chọn giá trị</option>
                                                                @foreach ($attributeValues as $value)
                                                                    <option value="{{ $value->id }}">{{ $value->value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <span class="add-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block" data-variant-index="{{ $index }}">Thêm</span>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-variant-btn" class="btn add-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block">Thêm Biến Thể</button>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                                <a href="{{ url('/admin/products/1') }}" class="btn btn-secondary ms-2">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .featured-dropzone {
            min-height: 200px;
            max-width: 300px;
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
            width: 150px !important;
            height: 150px !important;
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
    </style>
@endsection

@section('scripts')
    <script>
        let variantIndex = {{ $product->variants->count() }};

        // Thêm hàng biến thể mới
        document.getElementById('add-variant-btn').addEventListener('click', function() {
            variantIndex++;
            const container = document.getElementById('edit-variants-container');
            const row = document.createElement('div');
            row.className = 'variant-row mb-3 border p-3 rounded position-relative';
            row.innerHTML = `
                <span class="remove-variant-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Giá</label>
                        <input type="number" name="variants[${variantIndex}][price]" class="form-control" placeholder="0.00" step="0.01">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Số Lượng</label>
                        <input type="number" name="variants[${variantIndex}][quantity]" class="form-control" placeholder="0">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Trạng Thái</label>
                        <select class="form-select" name="variants[${variantIndex}][status]">
                            <option value="active">Kích Hoạt</option>
                            <option value="inactive">Không Kích Hoạt</option>
                        </select>
                    </div>
                </div>
                <div id="edit-variant-attributes-${variantIndex}">
                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                        <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Thuộc Tính</label>
                                <select class="form-select" name="variants[${variantIndex}][attributes][0][attribute_id]">
                                    <option value="">Chọn thuộc tính</option>
                                    @foreach ($attributes as $attributeOption)
                                        <option value="{{ $attributeOption->id }}">{{ $attributeOption->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Giá Trị</label>
                                <select class="form-select" name="variants[${variantIndex}][attributes][0][attribute_value_id]">
                                    <option value="">Chọn giá trị</option>
                                    @foreach ($attributeValues as $value)
                                        <option value="{{ $value->id }}">{{ $value->value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="add-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block" data-variant-index="${variantIndex}">Thêm</span>
            `;
            container.appendChild(row);
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
                const container = document.getElementById(`edit-variant-attributes-${variantIndex}`);
                const row = document.createElement('div');
                row.className = 'variant-attribute-row mb-3 border p-2 rounded position-relative';
                row.innerHTML = `
                    <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Thuộc Tính</label>
                            <select class="form-select" name="variants[${variantIndex}][attributes][${container.children.length}][attribute_id]">
                                <option value="">Chọn thuộc tính</option>
                                @foreach ($attributes as $attributeOption)
                                    <option value="{{ $attributeOption->id }}">{{ $attributeOption->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Giá Trị</label>
                            <select class="form-select" name="variants[${variantIndex}][attributes][${container.children.length}][attribute_value_id]">
                                <option value="">Chọn giá trị</option>
                                @foreach ($attributeValues as $value)
                                    <option value="{{ $value->id }}">{{ $value->value }}</option>
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
    </script>
@endsection