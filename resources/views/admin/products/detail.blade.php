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
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal">
                                Sửa
                            </button>
                            <a href="{{ route('admin.products-list') }}" class="btn btn-sm btn-secondary">
                                Quay Lại
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Thông Tin Cơ Bản -->
                        <h5 class="mb-3">Thông Tin Cơ Bản</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Tên Sản Phẩm</label>
                                <p class="form-control-static">Sample Product</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Giá Cơ Bản</label>
                                <p class="form-control-static">$99.99</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Danh Mục</label>
                                <p class="form-control-static">Electronics</p>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Mô Tả</label>
                                <p class="form-control-static">This is a sample product description.</p>
                            </div>
                        </div>

                        <!-- Hình Ảnh Nổi Bật -->
                        <h5 class="mb-3">Hình Ảnh Nổi Bật</h5>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="featured-dropzone" id="featured-dropzone" data-plugin="dropzone">
                                    <div class="dz-preview">
                                        <div class="dz-image">
                                            <img src="https://via.placeholder.com/150" alt="Featured Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hình Ảnh Sản Phẩm -->
                        <h5 class="mb-3">Hình Ảnh Sản Phẩm</h5>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="dropzone" id="images-dropzone" data-plugin="dropzone">
                                    <div class="d-flex gap-3">
                                        <div class="dz-preview">
                                            <div class="dz-image">
                                                <img src="https://via.placeholder.com/150" alt="Product Image 1">
                                            </div>
                                        </div>
                                        <div class="dz-preview">
                                            <div class="dz-image">
                                                <img src="https://via.placeholder.com/150" alt="Product Image 2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Biến Thể -->
                        <h5 class="mb-3">Biến Thể</h5>
                        <div id="variants-container">
                            <!-- Biến Thể 1 -->
                            <div class="variant-row mb-3 border p-3 rounded position-relative">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Giá</label>
                                        <p class="form-control-static">$109.99</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Số Lượng</label>
                                        <p class="form-control-static">50 (20 Sold)</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Trạng Thái</label>
                                        <p class="form-control-static">Kích Hoạt</p>
                                    </div>
                                </div>
                                <!-- Thuộc Tính Biến Thể -->
                                <div id="variant-attributes-0">
                                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Thuộc Tính</label>
                                                <p class="form-control-static">Color</p>
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Giá Trị</label>
                                                <p class="form-control-static">Red</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Thuộc Tính</label>
                                                <p class="form-control-static">Size</p>
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Giá Trị</label>
                                                <p class="form-control-static">M</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Biến Thể 2 -->
                            <div class="variant-row mb-3 border p-3 rounded position-relative">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Giá</label>
                                        <p class="form-control-static">$119.99</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Số Lượng</label>
                                        <p class="form-control-static">30 (10 Sold)</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Trạng Thái</label>
                                        <p class="form-control-static">Kích Hoạt</p>
                                    </div>
                                </div>
                                <!-- Thuộc Tính Biến Thể -->
                                <div id="variant-attributes-1">
                                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Thuộc Tính</label>
                                                <p class="form-control-static">Color</p>
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Giá Trị</label>
                                                <p class="form-control-static">Blue</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Thuộc Tính</label>
                                                <p class="form-control-static">Size</p>
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Giá Trị</label>
                                                <p class="form-control-static">L</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Product -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Sửa Sản Phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="edit-product-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Thông Tin Cơ Bản -->
                        <h5 class="mb-3">Thông Tin Cơ Bản</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="edit-product-name" class="form-label">Tên Sản Phẩm</label>
                                <input type="text" id="edit-product-name" name="name" class="form-control" value="Sample Product" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="edit-product-base-price" class="form-label">Giá Cơ Bản</label>
                                <input type="number" id="edit-product-base-price" name="base_price" class="form-control" step="0.01" value="99.99" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="edit-product-category" class="form-label">Danh Mục</label>
                                <select class="form-select" id="edit-product-category" name="category_id" required>
                                    <option value="1" selected>Electronics</option>
                                    <option value="2">Fashion</option>
                                    <option value="3">Home</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit-product-description" class="form-label">Mô Tả</label>
                                <textarea id="edit-product-description" name="description" class="form-control" rows="3">This is a sample product description.</textarea>
                            </div>
                        </div>

                        <!-- Hình Ảnh Nổi Bật -->
                        <h5 class="mb-3">Hình Ảnh Nổi Bật</h5>
                        <div class="row">
                            <div class_spn class="col-12 mb-3">
                                <label class="form-label">Tải Lên Hình Ảnh Nổi Bật</label>
                                <div class="dropzone featured-dropzone" id="edit-featured-dropzone" data-plugin="dropzone">
                                    <div class="dz-preview">
                                        <div class="dz-image">
                                            <img src="https://via.placeholder.com/150" alt="Featured Image">
                                        </div>
                                        <a class="dz-remove" href="javascript:undefined;">Xóa</a>
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
                            <!-- Biến Thể 1 -->
                            <div class="variant-row mb-3 border p-3 rounded position-relative">
                                <span class="remove-variant-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Giá</label>
                                        <input type="number" name="variants[0][price]" class="form-control" step="0.01" value="109.99" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Số Lượng</label>
                                        <input type="number" name="variants[0][quantity]" class="form-control" value="50" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Trạng Thái</label>
                                        <select class="form-select" name="variants[0][status]" required>
                                            <option value="active" selected>Kích Hoạt</option>
                                            <option value="inactive">Không Kích Hoạt</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="edit-variant-attributes-0">
                                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                        <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Thuộc Tính</label>
                                                <select class="form-select" name="variants[0][attributes][0][attribute_id]" required>
                                                    <option value="1" selected>Color</option>
                                                    <option value="2">Size</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Giá Trị</label>
                                                <select class="form-select" name="variants[0][attributes][0][attribute_value_id]" required>
                                                    <option value="1" selected>Red</option>
                                                    <option value="2">Blue</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                        <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Thuộc Tính</label>
                                                <select class="form-select" name="variants[0][attributes][1][attribute_id]" required>
                                                    <option value="1">Color</option>
                                                    <option value="2" selected>Size</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Giá Trị</label>
                                                <select class="form-select" name="variants[0][attributes][1][attribute_value_id]" required>
                                                    <option value="3">S</option>
                                                    <option value="4" selected>M</option>
                                                    <option value="5">L</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="add-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block" data-variant-index="0">Thêm</span>
                            </div>
                            <!-- Biến Thể 2 -->
                            <div class="variant-row mb-3 border p-3 rounded position-relative">
                                <span class="remove-variant-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Giá</label>
                                        <input type="number" name="variants[1][price]" class="form-control" step="0.01" value="119.99" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Số Lượng</label>
                                        <input type="number" name="variants[1][quantity]" class="form-control" value="30" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Trạng Thái</label>
                                        <select class="form-select" name="variants[1][status]" required>
                                            <option value="active" selected>Kích Hoạt</option>
                                            <option value="inactive">Không Kích Hoạt</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="edit-variant-attributes-1">
                                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                        <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Thuộc Tính</label>
                                                <select class="form-select" name="variants[1][attributes][0][attribute_id]" required>
                                                    <option value="1" selected>Color</option>
                                                    <option value="2">Size</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Giá Trị</label>
                                                <select class="form-select" name="variants[1][attributes][0][attribute_value_id]" required>
                                                    <option value="1">Red</option>
                                                    <option value="2" selected>Blue</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                                        <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Thuộc Tính</label>
                                                <select class="form-select" name="variants[1][attributes][1][attribute_id]" required>
                                                    <option value="1">Color</option>
                                                    <option value="2" selected>Size</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Giá Trị</label>
                                                <select class="form-select" name="variants[1][attributes][1][attribute_value_id]" required>
                                                    <option value="3">S</option>
                                                    <option value="4">M</option>
                                                    <option value="5" selected>L</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="add-variant-attribute-btn text-primary cursor-pointer mb-3 d-inline-block" data-variant-index="1">Thêm</span>
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
        .form-control-static {
            padding: 0.375rem 0.75rem;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }
    </style>
@endsection

@section('scripts')
    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet">

    <script>
        let variantIndex = 2;

        // Initialize Featured Image Dropzone for Edit Modal
        new Dropzone('#edit-featured-dropzone', {
            url: '#',
            maxFiles: 1,
            acceptedFiles: 'image/jpeg,image/png,image/gif',
            autoProcessQueue: false,
            addRemoveLinks: true,
            dictDefaultMessage: 'Kéo và thả một hình ảnh nổi bật tại đây, hoặc nhấn để duyệt',
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                    document.getElementById('edit-featured-image-input').value = file.name;
                });
                this.on('removedfile', function() {
                    document.getElementById('edit-featured-image-input').value = '';
                });
            }
        });

        // Initialize Product Images Dropzone for Edit Modal
        new Dropzone('#edit-images-dropzone', {
            url: '#',
            maxFilesize: 5,
            acceptedFiles: 'image/jpeg,image/png,image/gif',
            autoProcessQueue: false,
            addRemoveLinks: true,
            dictDefaultMessage: 'Kéo và thả hình ảnh bổ sung tại đây, hoặc nhấn để duyệt',
            init: function() {
                this.on('addedfile', function(file) {
                    let input = document.getElementById('edit-images-input');
                    let files = input.value ? input.value.split(',') : [];
                    files.push(file.name);
                    input.value = files.join(',');
                });
                this.on('removedfile', function(file) {
                    let input = document.getElementById('edit-images-input');
                    let files = input.value.split(',');
                    const index = files.indexOf(file.name);
                    if (index > -1) files.splice(index, 1);
                    input.value = files.join(',');
                });
            }
        });

        // Thêm hàng biến thể mới
        document.getElementById('add-variant-btn').addEventListener('click', function() {
            const container = document.getElementById('edit-variants-container');
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
                <div id="edit-variant-attributes-${variantIndex}">
                    <div class="variant-attribute-row mb-3 border p-2 rounded position-relative">
                        <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Thuộc Tính</label>
                                <select class="form-select" name="variants[${variantIndex}][attributes][0][attribute_id]" required>
                                    <option value="1">Color</option>
                                    <option value="2">Size</option>
                                </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Giá Trị</label>
                                <select class="form-select" name="variants[${variantIndex}][attributes][0][attribute_value_id]" required>
                                    <option value="1">Red</option>
                                    <option value="2">Blue</option>
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
                const container = document.getElementById(`edit-variant-attributes-${variantIndex}`);
                const row = document.createElement('div');
                row.className = 'variant-attribute-row mb-3 border p-2 rounded position-relative';
                row.innerHTML = `
                    <span class="remove-variant-attribute-text position-absolute top-0 end-0 mt-2 me-2 text-danger cursor-pointer">Xóa</span>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Thuộc Tính</label>
                            <select class="form-select" name="variants[${variantIndex}][attributes][${container.children.length}][attribute_id]" required>
                                <option value="1">Color</option>
                                <option value="2">Size</option>
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Giá Trị</label>
                            <select class="form-select" name="variants[${variantIndex}][attributes][${container.children.length}][attribute_value_id]" required>
                                <option value="1">Red</option>
                                <option value="2">Blue</option>
                                <option value="3">S</option>
                                <option value="4">M</option>
                                <option value="5">L</option>
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