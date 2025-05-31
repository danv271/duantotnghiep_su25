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
                        <form action="{{ route('admin.products-store') }}" method="POST" id="add-product-form" enctype="multipart/form-data">
                            @csrf

                            <!-- Thông Tin Cơ Bản Của Sản Phẩm -->
                            <h5 class="mb-3">Thông Tin Cơ Bản</h5>
                            <div class="row">
                                <!-- Tên Sản Phẩm, Giá Cơ Bản, và Danh Mục trên cùng một hàng -->
                                <div class="col-md-4 mb-3">
                                    <label for="product-name" class="form-label">Tên Sản Phẩm</label>
                                    <input type="text" id="product-name" name="name" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="product-base-price" class="form-label">Giá Cơ Bản</label>
                                    <input type="number" id="product-base-price" name="base_price" class="form-control" placeholder="0.00" step="0.01" value="{{ old('base_price') }}" required>
                                    @error('base_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="product-category" class="form-label">Danh Mục</label>
                                    <select class="form-select" id="product-category" name="category_id" required>
                                        <option value="">Chọn danh mục</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
                                                {{ $category->description }}
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
                                        <div class="dz-message needsclick">
                                            <i class="bx bx-cloud-upload fs-24 text-primary"></i>
                                            <h5 class="mt-2">Kéo và thả một hình ảnh nổi bật tại đây, hoặc nhấn để duyệt</h5>
                                            <small class="text-muted">Khuyến nghị: 1600 x 1200 (4:3). Định dạng PNG, JPG, GIF được phép. Chỉ cho phép một hình ảnh.</small>
                                        </div>
                                    </div>
                                    <input type="hidden" name="featured_image" id="featured-image-input">
                                    @error('featured_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Hình Ảnh Sản Phẩm -->
                            <h5 class="mb-3">Hình Ảnh Sản Phẩm</h5>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Tải Lên Hình Ảnh Bổ Sung</label>
                                    <div class="dropzone" id="images-dropzone" data-plugin="dropzone">
                                        <div class="dz-message needsclick">
                                            <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                                            <h3 class="mt-2">Kéo và thả hình ảnh bổ sung tại đây, hoặc nhấn để duyệt</h3>
                                            <small class="text-muted">Thêm hình ảnh cho thư viện sản phẩm. Khuyến nghị: 1600 x 1200 (4:3). Định dạng PNG, JPG, GIF được phép.</small>
                                        </div>
                                    </div>
                                    <input type="hidden" name="images[]" id="images-input" multiple>
                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Biến Thể Sản Phẩm -->
                            <h5 class="mb-3">Biến Thể</h5>
                            <div id="variants-container">
                                <div class="variant-row mb-3 border p-3 rounded position-relative">
                                    <span class="remove-variant-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Giá</label>
                                            <input type="number" name="variants[0][price]" class="form-control" placeholder="0.00" step="0.01" value="{{ old('variants.0.price') }}" required>
                                            @error('variants.0.price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Số Lượng</label>
                                            <input type="number" name="variants[0][quantity]" class="form-control" placeholder="0" value="{{ old('variants.0.quantity') }}" required>
                                            @error('variants.0.quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Trạng Thái</label>
                                            <select class="form-select" name="variants[0][status]" required>
                                                <option value="active" {{ old('variants.0.status') == 'active' ? 'selected' : '' }}>Kích Hoạt</option>
                                                <option value="inactive" {{ old('variants.0.status') == 'inactive' ? 'selected' : '' }}>Không Kích Hoạt</option>
                                            </select>
                                            @error('variants.0.status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Thuộc Tính Biến Thể -->
                                    <div id="variant-attributes-0">
                                        <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                            <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                            <div class="row">
                                                <div class="col-md-5 mb-3">
                                                    <label class="form-label">Thuộc Tính</label>
                                                    <select class="form-select variant-attribute-select" name="variants[0][attributes][0][attribute_id]" data-variant-index="0" data-attr-index="0" required>
                                                        <option value="">Chọn thuộc tính</option>
                                                        @foreach($attributes as $attribute)
                                                            <option value="{{ $attribute->attribute_id }}" {{ old('variants.0.attributes.0.attribute_id') == $attribute->attribute_id ? 'selected' : '' }}>
                                                                {{ $attribute->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('variants.0.attributes.0.attribute_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label class="form-label">Giá Trị</label>
                                                    <select class="form-select variant-attribute-value-select" name="variants[0][attributes][0][attribute_value_id]" data-variant-index="0" data-attr-index="0" required>
                                                        <option value="">Chọn giá trị</option>
                                                        @foreach($attributeValues as $value)
                                                            <option value="{{ $value->attribute_value_id }}" {{ old('variants.0.attributes.0.attribute_value_id') == $value->attribute_value_id ? 'selected' : '' }}>
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
                            </div>
                            <button type="button" id="add-variant-btn" class="btn add-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block">Thêm Biến Thể</button>

                            <!-- Nút Gửi Form -->
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                                <a href="{{ route('admin.products-list') }}" class="btn btn-secondary ms-2">Hủy</a>
                            </div>
                        </form>
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
        .featured-dropzone .dz-preview {
            margin: 0 auto;
            position: relative;
        }
        .featured-dropzone .dz-image {
            width: 150px !important;
            height: 150px !important;
            border-radius: 8px;
        }
        .featured-dropzone .dz-remove {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            line-height: 24px;
            text-align: center;
            font-size: 12px;
            cursor: pointer;
            display: none;
        }
        .featured-dropzone .dz-preview:hover .dz-remove {
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
    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet">

    <script>
        let variantIndex = 1;

        // Demo attribute-value mapping (for simplicity, hardcoded based on demo data)
        const attributeValueMap = {
            1: [1, 2, 3], // Color: Red, Blue, Green
            2: [4, 5, 6, 7], // Size: XS, S, M, L
            3: [8, 9, 10], // Material: Cotton, Leather, Polyester
            4: [11, 12, 13] // Brand: Nike, Adidas, Samsung
        };

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

        // Initialize Featured Image Dropzone
        new Dropzone('#featured-dropzone', {
            url: '{{ route('admin.products.upload-file') }}',
            maxFiles: 1,
            acceptedFiles: 'image/jpeg,image/png,image/gif',
            autoProcessQueue: false,
            addRemoveLinks: false, // Tắt mặc định để tùy chỉnh nút xóa
            previewTemplate: `
                <div class="dz-preview dz-file-preview">
                    <div class="dz-image"><img data-dz-thumbnail /></div>
                    <div class="dz-details">
                        <div class="dz-filename"><span data-dz-name></span></div>
                        <div class="dz-size" data-dz-size></div>
                    </div>
                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                    <div class="dz-success-mark"><span>✔</span></div>
                    <div class="dz-error-mark"><span>✘</span></div>
                    <a class="dz-remove" href="javascript:undefined;" data-dz-remove>X</a>
                </div>
            `,
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                    document.getElementById('featured-image-input').value = file.name;
                });
                this.on('removedfile', function() {
                    document.getElementById('featured-image-input').value = '';
                });
                this.on('maxfilesexceeded', function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                });
            }
        });

        // Initialize Product Images Dropzone
        new Dropzone('#images-dropzone', {
            url: '{{ route('admin.products.upload-file') }}',
            maxFilesize: 5,
            acceptedFiles: 'image/jpeg,image/png,image/gif',
            autoProcessQueue: false,
            addRemoveLinks: true,
            dictDefaultMessage: 'Kéo và thả hình ảnh bổ sung tại đây, hoặc nhấn để duyệt',
            init: function() {
                this.on('addedfile', function(file) {
                    let input = document.getElementById('images-input');
                    let files = input.value ? input.value.split(',') : [];
                    files.push(file.name);
                    input.value = files.join(',');
                });
                this.on('removedfile', function(file) {
                    let input = document.getElementById('images-input');
                    let files = input.value.split(',');
                    const index = files.indexOf(file.name);
                    if (index > -1) files.splice(index, 1);
                    input.value = files.join(',');
                });
            }
        });

        // Handle form submission with Dropzone files
        document.getElementById('add-product-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const featuredDropzone = Dropzone.forElement('#featured-dropzone');
            const imagesDropzone = Dropzone.forElement('#images-dropzone');

            if (featuredDropzone.files.length > 0 || imagesDropzone.files.length > 0) {
                const formData = new FormData(this);
                featuredDropzone.files.forEach(file => formData.append('featured_image', file));
                imagesDropzone.files.forEach(file => formData.append('images[]', file));

                fetch('{{ route('admin.products-store') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = '{{ route('admin.products-list') }}';
                    } else {
                        alert('Lỗi khi tải hình ảnh lên. Vui lòng thử lại.');
                    }
                })
                .catch(error => console.error('Lỗi:', error));
            } else {
                this.submit();
            }
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
                        <input type="number" name="variants[${variantIndex}][price]" class="form-control" placeholder="0.00" step="0.01" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Số Lượng</label>
                        <input type="number" name="variants[${variantIndex}][quantity]" class="form-control" placeholder="0" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Trạng Thái</label>
                        <select class="form-select" name="variants[${variantIndex}][status]" required>
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
                                <select class="form-select variant-attribute-select" name="variants[${variantIndex}][attributes][0][attribute_id]" data-variant-index="${variantIndex}" data-attr-index="0" required>
                                    <option value="">Chọn thuộc tính</option>
                                    @foreach($attributes as $attribute)
                                        <option value="{{ $attribute->attribute_id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Giá Trị</label>
                                <select class="form-select variant-attribute-value-select" name="variants[${variantIndex}][attributes][0][attribute_value_id]" data-variant-index="${variantIndex}" data-attr-index="0" required>
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
                const row = document.createElement('div');
                row.className = 'variant-attribute-row mb-3 border p-2 rounded position-relative';
                row.innerHTML = `
                    <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Thuộc Tính</label>
                            <select class="form-select variant-attribute-select" name="variants[${variantIndex}][attributes][${container.children.length}][attribute_id]" data-variant-index="${variantIndex}" data-attr-index="${container.children.length}" required>
                                <option value="">Chọn thuộc tính</option>
                                @foreach($attributes as $attribute)
                                    <option value="{{ $attribute->attribute_id }}">{{ $attribute->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Giá Trị</label>
                            <select class="form-select variant-attribute-value-select" name="variants[${variantIndex}][attributes][${container.children.length}][attribute_value_id]" data-variant-index="${variantIndex}" data-attr-index="${container.children.length}" required>
                                <option value="">Chọn giá trị</option>
                                @foreach($attributeValues as $value)
                                    <option value="{{ $value->attribute_value_id }}">{{ $value->value }}</option>
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

        // Cập nhật dropdown giá trị thuộc tính động
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('variant-attribute-select')) {
                const variantIndex = e.target.getAttribute('data-variant-index');
                const attrIndex = e.target.getAttribute('data-attr-index');
                const valueSelect = document.querySelector(`.variant-attribute-value-select[data-variant-index="${variantIndex}"][data-attr-index="${attrIndex}"]`);
                updateAttributeValues(e.target, valueSelect);
            }
        });

        // Khởi tạo dropdown giá trị thuộc tính hiện có
        document.querySelectorAll('.variant-attribute-select').forEach(select => {
            const variantIndex = select.getAttribute('data-variant-index');
            const attrIndex = select.getAttribute('data-attr-index');
            const valueSelect = document.querySelector(`.variant-attribute-value-select[data-variant-index="${variantIndex}"][data-attr-index="${attrIndex}"]`);
            if (select.value) updateAttributeValues(select, valueSelect);
        });
    </script>
@endsection