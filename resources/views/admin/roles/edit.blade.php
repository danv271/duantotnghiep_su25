@extends('admin.layouts.app')

@section('title', 'Update Role')

@section('header', 'Update Role')

@section('content')
    <!-- Start Container Fluid -->
    <div class="container-xxl">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Role Information</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.roles.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="roles-name" class="form-label">Role Name</label>
                                <input type="text" name="role_name" id="roles-name" class="form-control"
                                    placeholder="Enter role name" value="{{ old('role_name', $data->role_name) }}">
                                @error('role_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="workspace" class="form-label">Workspace</label>
                            <select class="form-control" id="workspace" data-choices data-choices-groups data-placeholder="Select Workspace">
                                <option value="">Select Workspace</option>
                                <option value="Main Workspace">Main Workspace</option>
                                <option value="Development">Development</option>
                                <option value="Testing">Testing</option>
                                <option value="Production">Production</option>
                            </select>
                        </div>
                    </div> --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" id="description" class="form-control"
                                    placeholder="Enter role description"value="{{ old('role_name', $data->description) }}">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="user-name" class="form-label">Users</label>
                                <select class="form-control" name="user_id" id="choices-multiple-remove-button-users" data-choices
                                    data-choices-removeItem name="choices-multiple-remove-button-users" multiple>
                                    @foreach ($listUser as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-top">
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Role</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- End Container Fluid -->
@endsection
