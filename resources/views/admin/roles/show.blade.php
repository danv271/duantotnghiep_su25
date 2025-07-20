@extends('admin.layouts.app')

@section('title', 'Chi Tiết Vai Trò')

@section('header', 'Chi Tiết Vai Trò')

@section('content')
    <!-- Start Container Fluid -->
    <div class="container-xxl">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thông Tin Vai Trò</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="text-nowrap" style="width: 200px;">Tên Vai Trò</th>
                                <td>{{ $role->role_name }}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap">Nhãn</th>
                                <td>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge bg-primary">{{ $role->role_name }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-nowrap">Người Dùng</th>
                                <td>
                                    <div class="d-flex flex-wrap gap-2">
                                        @if (isset($role->users))
                                            @foreach ($role->users as $user)
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset($user->avatar) }}"
                                                        class="rounded-circle avatar-xs me-2" alt="avatar">
                                                    <span>{{ $user->name }}</span>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-nowrap">Ngày Tạo</th>
                                <td>{{$role->created_at}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap">Cập Nhật Cuối</th>
                                <td>{{$role->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer border-top">
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-light">Quay Lại Danh Sách</a>
                    <a href="{{ route('admin.roles.edit', 1) }}" class="btn btn-primary">Chỉnh Sửa Vai Trò</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container Fluid -->
@endsection