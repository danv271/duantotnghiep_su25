@extends('admin.layouts.app')

@section('title', 'Roles List')

@section('header', 'Roles List')

@section('content')
    <!-- Start Container Fluid -->
    <div class="container-xxl">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card overflow-hiddenCoupons">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover table-centered">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th>Role</th>
                                <th>Description</th>
                                <th>Tags</th>
                                <th>Users</th>
                                <th></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->role_name }}</td>
                                    <td>
                                        {{ $item->description }}
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-light-subtle text-muted border py-1 px-2">{{ $item->role_name }}</span>
                                    </td>
                                    <td>
                                        <div class="avatar-group">
                                            @if ($item->users->count() > 0 && $item->users->count() <= 3)
                                                @foreach ($item->users as $user)
                                                    {{-- <div class="avatar">
                                                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                                            class="avatar-sm rounded-circle shadow">
                                                    </div> --}}
                                                    <div class="avatar">
                                                        <span
                                                            style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-size: smaller"
                                                            class="avatar-sm d-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle fw-bold shadow">{{ $user->name }}</span>
                                                    </div>
                                                @endforeach
                                            @elseif ($item->users->count() > 3)
                                                @foreach ($item->users->take(2) as $user)
                                                    <div class="avatar">
                                                        <span
                                                            style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-size: smaller"
                                                            class="avatar-sm d-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle fw-bold shadow">{{ $user->name }}</span>
                                                    </div>
                                                @endforeach
                                                <div class="avatar">
                                                    <span
                                                        style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-size: smaller"
                                                        class="avatar-sm d-flex align-items-center justify-content-center bg-dark text-white rounded-circle fw-bold shadow">{{ $user->count() }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.roles.show', $item->id) }}" class="btn btn-light btn-sm">
                                                <iconify-icon icon="solar:eye-broken"
                                                    class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <a href="{{ route('admin.roles.edit', 1) }}"
                                                class="btn btn-soft-primary btn-sm">
                                                <iconify-icon icon="solar:pen-2-broken"
                                                    class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <button type="button" class="btn btn-soft-danger btn-sm">
                                                <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                    class="align-middle fs-18"></iconify-icon>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>

                                </td>
                                <td>
                                    <a href="{{ route('admin.roles.create') }}" class="link-primary">+ Add Role</a>
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
                        Showing <span class="fw-semibold">1</span> to <span class="fw-semibold">2</span> of <span
                            class="fw-semibold">2</span> Results
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
