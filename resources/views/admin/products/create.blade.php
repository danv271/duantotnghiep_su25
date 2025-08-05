@extends('admin.layouts.app')

@section('title', 'Thêm Sản Phẩm | Larkon - Responsive Admin Dashboard Template')

@section('page-title', 'Thêm Sản Phẩm')

@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm Sản Phẩm Mới</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="POST" id="add-product-form" enctype="multipart/form-data">
                            @csrf

                            <!-- Thông Tin Cơ Bản Của Sản Phẩm -->
                            <h5 class="mb-3">Thông Tin Cơ Bản</h5>
                            <div class="row">
                                <!-- Tên Sản Phẩm, Giá Cơ Bản, và Danh Mục trên cùng một hàng -->
                                <div class="col-md-4 mb-3">
                                    <label for="product-name" class="form-label">Tên Sản Phẩm</label>
                                    <input type="text" id="product-name" name="name" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="product-base-price" class="form-label">Giá Cơ Bản</label>
                                    <input type="number" id="product-base-price" name="base_price" class="form-control" placeholder="0.00" step="0.01" value="{{ old('base_price') }}">
                                    @error('base_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="product-category" class="form-label">Danh Mục</label>
                                    <select class="form-select" id="product-category" name="category_id">
                                        <option value="">Chọn danh mục</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @endif
                                </div>
                                <!-- Mô Tả trên một hàng riêng -->
                                <div class="col-12 mb-3">
                                    <label for="product-description" class="form-label">Mô Tả</label>
                                    <textarea id="product-description" name="description" class="form-control" placeholder="Nhập mô tả sản phẩm" rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Hình Ảnh Nổi Bật -->
                            <h5 class="mb-3">Hình Ảnh Nổi Bật</h5>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Tải Lên Hình Ảnh Nổi Bật</label>
                                    <div class="dropzone featured-dropzone" id="featured-dropzone" data-plugin="dropzone">
                                        <div class="dz-preview">
                                            <div class="dz-image">
                                                <img src="" alt="Featured Image" style="width:300px; display:none;" id="featured-image-preview">
                                            </div>
                                            <a class="dz-remove" href="javascript:void(0);" onclick="document.getElementById('featured-image-upload').click();" id="featured-image-change" style="display:none;">Thay đổi</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-2" onclick="document.getElementById('featured-image-upload').click();" id="featured-image-add">Thêm Ảnh</button>
                                    <input type="file" id="featured-image-upload" name="featured_image" accept="image/jpeg,image/png,image/gif" style="display: none;">
                                    @error('featured_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @endif
                                    <small class="text-muted">Khuyến nghị: 1600 x 1200 (4:3). Định dạng PNG, JPG, GIF được phép. Chỉ cho phép một hình ảnh.</small>
                                </div>
                            </div>

                            <!-- Hình Ảnh Sản Phẩm -->
                            <h5 class="mb-3">Hình Ảnh Sản Phẩm</h5>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="images" class="form-label">Tải Lên Hình Ảnh Bổ Sung</label>
                                    <div class="dropzone" id="images-dropzone" data-plugin="dropzone">
                                        <div class="d-flex row" id="existing-images">
                                            <!-- Ảnh được thêm sẽ hiển thị ở đây -->
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-2" onclick="document.getElementById('images-upload').click();" id="add-image-button">Thêm Ảnh</button>
                                    <input type="file" id="images-upload" name="images[]" multiple accept="image/jpeg,image/png,image/gif" style="display: none;">
                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @endif
                                    <small class="text-muted">Thêm hình ảnh cho thư viện sản phẩm. Khuyến nghị: 1600 x 1200 (4:3). Định dạng PNG, JPG, GIF được phép.</small>
                                </div>
                            </div>

                            <!-- Biến Thể Sản Phẩm -->
                            <h5 class="mb-3">Biến Thể</h5>
                            <div id="variants-container">
                                @if (old('variants'))
                                    @foreach (old('variants') as $index => $variant)
                                        <div class="variant-row mb-3 border p-3 rounded position-relative">
                                            <span class="remove-variant-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Giá</label>
                                                    <input type="number" name="variants[{{ $index }}][price]" class="form-control" placeholder="0.00" step="0.01" value="{{ $variant['price'] ?? old('variants.' . $index . '.price') }}">
                                                    @error("variants.$index.price")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Số Lượng</label>
                                                    <input type="number" name="variants[{{ $index }}][quantity]" class="form-control" placeholder="0" value="{{ $variant['quantity'] ?? old('variants.' . $index . '.quantity') }}">
                                                    @error("variants.$index.quantity")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Trạng Thái</label>
                                                    <select class="form-select" name="variants[{{ $index }}][status]">
                                                        <option value="active" {{ (old("variants.$index.status") ?? $variant['status'] ?? 'active') == 'active' ? 'selected' : '' }}>Kích Hoạt</option>
                                                        <option value="inactive" {{ (old("variants.$index.status") ?? $variant['status'] ?? '') == 'inactive' ? 'selected' : '' }}>Không Kích Hoạt</option>
                                                    </select>
                                                    @error("variants.$index.status")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div id="variant-attributes-{{ $index }}">
                                                @if (isset($variant['attributes']) && count($variant['attributes']))
                                                    @foreach ($variant['attributes'] as $attrIndex => $attribute)
                                                        <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                                            <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                                            <div class="row">
                                                                <div class="col-md-5 mb-3">
                                                                    <label class="form-label">Thuộc Tính</label>
                                                                    <select class="form-select variant-attribute-select" name="variants[{{ $index }}][attributes][{{ $attrIndex }}][attribute_id]" data-variant-index="{{ $index }}" data-attr-index="{{ $attrIndex }}">
                                                                        <option value="">Chọn thuộc tính</option>
                                                                        @foreach($attributes as $attributeOption)
                                                                            <option value="{{ $attributeOption->id }}" {{ (old("variants.$index.attributes.$attrIndex.attribute_id") ?? $attribute['attribute_id'] ?? '') == $attributeOption->id ? 'selected' : '' }}>
                                                                                {{ $attributeOption->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error("variants.$index.attributes.$attrIndex.attribute_id")
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-5 mb-3">
                                                                    <label class="form-label">Giá Trị</label>
                                                                    <select class="form-select variant-attribute-value-select" name="variants[{{ $index }}][attributes][{{ $attrIndex }}][attribute_value_id]" data-variant-index="{{ $index }}" data-attr-index="{{ $attrIndex }}">
                                                                        <option value="">Chọn giá trị</option>
                                                                        @foreach($attributeValues as $value)
                                                                            <option value="{{ $value->attribute_value_id }}" {{ (old("variants.$index.attributes.$attrIndex.attribute_value_id") ?? $attribute['attribute_value_id'] ?? '') == $value->attribute_value_id ? 'selected' : '' }}>
                                                                                {{ $value->value }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error("variants.$index.attributes.$attrIndex.attribute_value_id")
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                                        <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                                        <div class="row">
                                                            <div class="col-md-5 mb-3">
                                                                <label class="form-label">Thuộc Tính</label>
                                                                <select class="form-select variant-attribute-select" name="variants[{{ $index }}][attributes][0][attribute_id]" data-variant-index="{{ $index }}" data-attr-index="0">
                                                                    <option value="">Chọn thuộc tính</option>
                                                                    @foreach($attributes as $attributeOption)
                                                                        <option value="{{ $attributeOption->id }}">
                                                                            {{ $attributeOption->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error("variants.$index.attributes.0.attribute_id")
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-5 mb-3">
                                                                <label class="form-label">Giá Trị</label>
                                                                <select class="form-select variant-attribute-value-select" name="variants[{{ $index }}][attributes][0][attribute_value_id]" data-variant-index="{{ $index }}" data-attr-index="0">
                                                                    <option value="">Chọn giá trị</option>
                                                                    @foreach($attributeValues as $value)
                                                                        <option value="{{ $value->attribute_value_id }}">
                                                                            {{ $value->value }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error("variants.$index.attributes.0.attribute_value_id")
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <span class="add-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block" data-variant-index="{{ $index }}">Thêm</span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="variant-row mb-3 border p-3 rounded position-relative">
                                        <span class="remove-variant-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Giá</label>
                                                <input type="number" name="variants[0][price]" class="form-control" placeholder="0.00" step="0.01" value="{{ old('variants.0.price') }}">
                                                @error('variants.0.price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Số Lượng</label>
                                                <input type="number" name="variants[0][quantity]" class="form-control" placeholder="0" value="{{ old('variants.0.quantity') }}">
                                                @error('variants.0.quantity')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Trạng Thái</label>
                                                <select class="form-select" name="variants[0][status]">
                                                    <option value="active" {{ old('variants.0.status') == 'active' ? 'selected' : '' }}>Kích Hoạt</option>
                                                    <option value="inactive" {{ old('variants.0.status') == 'inactive' ? 'selected' : '' }}>Không Kích Hoạt</option>
                                                </select>
                                                @error('variants.0.status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div id="variant-attributes-0">
                                            <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                                <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                                <div class="row">
                                                    <div class="col-md-5 mb-3">
                                                        <label class="form-label">Thuộc Tính</label>
                                                        <select class="form-select variant-attribute-select" name="variants[0][attributes][0][attribute_id]" data-variant-index="0" data-attr-index="0">
                                                            <option value="">Chọn thuộc tính</option>
                                                            @foreach($attributes as $attributeOption)
                                                                <option value="{{ $attributeOption->id }}">
                                                                    {{ $attributeOption->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('variants.0.attributes.0.attribute_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-5 mb-3">
                                                        <label class="form-label">Giá Trị</label>
                                                        <select class="form-select variant-attribute-value-select" name="variants[0][attributes][0][attribute_value_id]" data-variant-index="0" data-attr-index="0">
                                                            <option value="">Chọn giá trị</option>
                                                            @foreach($attributeValues as $value)
                                                                <option value="{{ $value->attribute_value_id }}">
                                                                    {{ $value->value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('variants.0.attributes.0.attribute_value_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="add-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block" data-variant-index="0">Thêm</span>
                                    </div>
                                @endif
                            </div>
                            <button type="button" id="add-variant-btn" class="btn add-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block">Thêm Biến Thể</button>

                            <!-- Nút Gửi Form -->
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                                <a href="{{ route('admin.products.list') }}" class="btn btn-secondary ms-2">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .dropzone {
            border: 2px dashed #dee2e6;
            padding: 20px;
            min-height: 150px;
        }
        .dropzone .dz-preview {
            display: inline-block;
            margin: 10px;
            text-align: center; /* Căn giữa nội dung trong dz-preview */
        }
        .dropzone .dz-preview .dz-image img {
            max-width: 100%;
            height: auto;
        }
        .dropzone .dz-remove {
            display: block;
            text-align: center;
            color: #dc3545;
            text-decoration: none;
            cursor: pointer;
            margin-top: 5px; /* Khoảng cách từ ảnh đến nút Xóa */
        }
        .dropzone .dz-remove:hover {
            color: #c82333;
        }
    </style>
@endsection

@section('scripts')
    <script>
        let variantIndex = @if(old('variants')) {{ count(old('variants')) }} @else 1 @endif;

        // Dynamic attribute-value mapping from backend
        const attributeValueMap = @json($attributes->mapWithKeys(function ($attribute) {
            return [$attribute->id => $attribute->attributesValues ? $attribute->attributesValues->pluck('id')->toArray() : []];
        }));
        const attributeValues = @json($attributeValues);

        // Function to update attribute values based on selected attribute
        function updateAttributeValues(attributeSelect, valueSelect) {
            const attributeId = attributeSelect.value;
            const valueSelectOptions = valueSelect.querySelectorAll('option');
            valueSelectOptions.forEach(option => {
                option.style.display = 'none';
                if (!option.value || attributeValueMap[attributeId]?.includes(parseInt(option.value))) {
                    option.style.display = 'block';
                }
            });
            valueSelect.value = ''; // Reset selection
        }

        // Xử lý thay đổi ảnh nổi bật
        document.getElementById('featured-image-upload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('featured-image-preview');
                    img.src = e.target.result;
                    img.style.display = 'block';
                    document.getElementById('featured-image-add').style.display = 'none';
                    document.getElementById('featured-image-change').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Xử lý thêm ảnh sản phẩm
        document.getElementById('images-upload').addEventListener('change', function(e) {
            const files = e.target.files;
            const previewContainer = document.getElementById('existing-images');
            
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'dz-preview col-3 m-0';
                    div.innerHTML = `
                        <div class="dz-image" style="width:100%;">
                            <img src="${e.target.result}" alt="Product Image" width="100%">
                        </div>
                        <a class="dz-remove" href="javascript:void(0);" onclick="this.parentElement.remove();">Xóa</a>
                    `;
                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        });

        // Thêm hàng biến thể mới
        document.getElementById('add-variant-btn').addEventListener('click', function() {
            const container = document.getElementById('variants-container');
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
                <div id="variant-attributes-${variantIndex}">
                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                        <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Thuộc Tính</label>
                                <select class="form-select variant-attribute-select" name="variants[${variantIndex}][attributes][0][attribute_id]" data-variant-index="${variantIndex}" data-attr-index="0">
                                    <option value="">Chọn thuộc tính</option>
                                    @foreach($attributes as $attributeOption)
                                        <option value="{{ $attributeOption->id }}">{{ $attributeOption->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Giá Trị</label>
                                <select class="form-select variant-attribute-value-select" name="variants[${variantIndex}][attributes][0][attribute_value_id]" data-variant-index="${variantIndex}" data-attr-index="0">
                                    <option value="">Chọn giá trị</option>
                                    @foreach($attributeValues as $value)
                                        <option value="{{ $value->attribute_value_id }}">{{ $value->value }}</option>
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

        // Xóa hàng biến thể bằng văn bản "Xóa"
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-variant-text')) {
                const rows = document.querySelectorAll('.variant-row');
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
                const container = document.getElementById(`variant-attributes-${variantIndex}`);
                const attrIndex = container.children.length;
                const row = document.createElement('div');
                row.className = 'variant-attribute-row mb-3 border p-2 rounded position-relative';
                row.innerHTML = `
                    <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Thuộc Tính</label>
                            <select class="form-select variant-attribute-select" name="variants[${variantIndex}][attributes][${attrIndex}][attribute_id]" data-variant-index="${variantIndex}" data-attr-index="${attrIndex}">
                                <option value="">Chọn thuộc tính</option>
                                @foreach($attributes as $attributeOption)
                                    <option value="{{ $attributeOption->id }}">{{ $attributeOption->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Giá Trị</label>
                            <select class="form-select variant-attribute-value-select" name="variants[${variantIndex}][attributes][${attrIndex}][attribute_value_id]" data-variant-index="${variantIndex}" data-attr-index="${attrIndex}">
                                <option value="">Chọn giá trị</option>
                                @foreach($attributeValues as $value)
                                    <option value="{{ $value->attribute_value_id }}">{{ $value->value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                `;
                container.appendChild(row);
                updateAttributeSelectOptions(variantIndex);
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

        // Cập nhật dropdown giá trị thuộc tính động
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('variant-attribute-select')) {
                const variantIndex = e.target.getAttribute('data-variant-index');
                const attrIndex = e.target.getAttribute('data-attr-index');
                const valueSelect = document.querySelector(`.variant-attribute-value-select[data-variant-index="${variantIndex}"][data-attr-index="${attrIndex}"]`);
                updateAttributeValues(e.target, valueSelect);
                updateAttributeSelectOptions(variantIndex); // 🆕 Bổ sung
            }
        });

        // Khởi tạo dropdown giá trị thuộc tính hiện có
        document.querySelectorAll('.variant-attribute-select').forEach(select => {
            const variantIndex = select.getAttribute('data-variant-index');
            const attrIndex = select.getAttribute('data-attr-index');
            const valueSelect = document.querySelector(`.variant-attribute-value-select[data-variant-index="${variantIndex}"][data-attr-index="${attrIndex}"]`);
            if (select.value) updateAttributeValues(select, valueSelect);
            updateAttributeSelectOptions(variantIndex);
        });

        function updateAttributeSelectOptions(variantIndex) {
            const selects = document.querySelectorAll(`.variant-row [data-variant-index="${variantIndex}"].variant-attribute-select`);

            const selectedValues = Array.from(selects)
                .map(select => select.value)
                .filter(val => val !== '');

            selects.forEach(currentSelect => {
                const currentValue = currentSelect.value;
                const options = currentSelect.querySelectorAll('option');

                options.forEach(option => {
                    if (!option.value) return;

                    if (selectedValues.includes(option.value) && option.value !== currentValue) {
                        option.style.display = 'none';
                    } else {
                        option.style.display = 'block';
                    }
                });
            });
        }

    </script>
@endsection