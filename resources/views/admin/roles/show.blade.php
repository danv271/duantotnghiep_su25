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
                            <td>Workspace Manager</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">Workspace</th>
                            <td>Facebook</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">Tags</th>
                            <td>
                                <div class="d-flex flex-wrap gap-2">
                                    <span class="badge bg-primary">Manager</span>
                                    <span class="badge bg-info">Data</span>
                                    <span class="badge bg-success">Product</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">Users</th>
                            <td>
                                <div class="d-flex flex-wrap gap-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/avatar/avatar-1.jpg') }}" class="rounded-circle avatar-xs me-2" alt="avatar">
                                        <span>Gaston Lapierre</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/avatar/avatar-2.jpg') }}" class="rounded-circle avatar-xs me-2" alt="avatar">
                                        <span>John Doe</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">Status</th>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">Created At</th>
                            <td>January 15, 2024</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">Last Updated</th>
                            <td>February 20, 2024</td>
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
