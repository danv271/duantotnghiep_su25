@extends('admin.layouts.app')

@section('title', 'Role Details')

@section('header', 'Role Details')

@section('content')
    <!-- Start Container Fluid -->
    <div class="container-xxl">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Role Information</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="text-nowrap" style="width: 200px;">Role Name</th>
                                <td>{{ $role->role_name }}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap">Tags</th>
                                <td>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge bg-primary">{{ $role->role_name }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-nowrap">Users</th>
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
                                <th class="text-nowrap">Created At</th>
                                <td>{{$role->created_at}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap">Last Updated</th>
                                <td>{{$role->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer border-top">
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-light">Back to List</a>
                    <a href="{{ route('admin.roles.edit', 1) }}" class="btn btn-primary">Edit Role</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container Fluid -->
@endsection
