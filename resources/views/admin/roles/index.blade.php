@extends('admin.layouts.app')

@section('title', 'Roles List')

@section('header', 'Roles List')

@section('content')
<!-- Start Container Fluid -->
<div class="container-xxl">
    <div class="card overflow-hiddenCoupons">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover table-centered">
                    <thead class="bg-light-subtle">
                        <tr>
                            <th>Role</th>
                            <th>Workspace</th>
                            <th>Tags</th>
                            <th>Users</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Admin</td>
                            <td>
                                <img src="{{ asset('assets/images/app-calendar/calendar.png') }}" class="avatar-xs rounded-circle me-1" alt="..."> Main Workspace
                            </td>
                            <td>
                                <span class="badge bg-light-subtle text-muted border py-1 px-2">Admin</span>
                                <span class="badge bg-light-subtle text-muted border py-1 px-2">Manager</span>
                            </td>
                            <td>
                                <div class="avatar-group">
                                    <div class="avatar">
                                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </div>
                                    <div class="avatar">
                                        <span class="avatar-sm d-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle fw-bold shadow">J</span>
                                    </div>
                                    <div class="avatar">
                                        <span class="avatar-sm d-flex align-items-center justify-content-center bg-dark text-white rounded-circle fw-bold shadow">+2</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.roles.show', 1) }}" class="btn btn-light btn-sm">
                                        <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                    </a>
                                    <a href="{{ route('admin.roles.edit', 1) }}" class="btn btn-soft-primary btn-sm">
                                        <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                    </a>
                                    <button type="button" class="btn btn-soft-danger btn-sm">
                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Editor</td>
                            <td>
                                <a href="#" class="link-primary">+ Add Workspace</a>
                            </td>
                            <td>
                                <span class="badge bg-light-subtle text-muted border py-1 px-2">Editor</span>
                            </td>
                            <td>
                                <a href="#" class="link-primary">+ Add User</a>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked2">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.roles.show', 2) }}" class="btn btn-light btn-sm">
                                        <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                    </a>
                                    <a href="{{ route('admin.roles.edit', 2) }}" class="btn btn-soft-primary btn-sm">
                                        <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                    </a>
                                    <button type="button" class="btn btn-soft-danger btn-sm">
                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- end table-responsive -->
        </div>
        <div class="row g-0 align-items-center justify-content-between text-center text-sm-start p-3 border-top">
            <div class="col-sm">
                <div class="text-muted">
                    Showing <span class="fw-semibold">1</span> to <span class="fw-semibold">2</span> of <span class="fw-semibold">2</span> Results
                </div>
            </div>
            <div class="col-sm-auto mt-3 mt-sm-0">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> <!-- end card -->
</div>
<!-- End Container Fluid -->
@endsection