@extends('admin.layouts.app')

@section('title', 'Tạo Vai Trò')

@section('header', 'Tạo Vai Trò')

@section('content')
    <!-- Start Container Fluid -->
    <div class="container-xxl">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thông Tin Vai Trò</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="roles-name" class="form-label">Tên Vai Trò</label>
                                <input type="text" name="role_name" id="roles-name" class="form-control"
                                    placeholder="Nhập tên vai trò">
                                @error('role_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="workspace" class="form-label">Không gian làm việc</label>
                            <select class="form-control" id="workspace" data-choices data-choices-groups data-placeholder="Chọn không gian làm việc">
                                <option value="">Chọn không gian làm việc</option>
                                <option value="Main Workspace">Không gian làm việc chính</option>
                                <option value="Development">Phát triển</option>
                                <option value="Testing">Kiểm thử</option>
                                <option value="Production">Sản xuất</option>
                            </select>
                        </div>
                    </div> --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="description" class="form-label">Mô Tả</label>
                                <input type="text" name="description" id="description" class="form-control"
                                    placeholder="Nhập mô tả vai trò">
                                @error(isset($err['description']))
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        {{-- <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="user-name" class="form-label">Người dùng</label>
                                <select class="form-control" id="choices-multiple-remove-button-users" data-choices
                                    data-choices-removeItem name="choices-multiple-remove-button-users" multiple>
                                    @foreach ($data as $user)
                                    <option value="John Doe">John Doe</option>
                                    @endforeach
                                    <option value="Jane Smith">Jane Smith</option>
                                    <option value="Mike Johnson">Mike Johnson</option>
                                    <option value="Sarah Williams">Sarah Williams</option>
                                </select>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-footer border-top">
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-light">Hủy</a>
                            <button type="submit" class="btn btn-primary">Tạo Vai Trò</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- End Container Fluid -->
@endsection