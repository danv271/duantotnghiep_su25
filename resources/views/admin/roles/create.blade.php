@extends('admin.layouts.app')

@section('title', 'Create Role')

@section('header', 'Create Role')

@section('content')
<!-- Start Container Fluid -->
<div class="container-xxl">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Role Information</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="roles-name" class="form-label">Role Name</label>
                            <input type="text" id="roles-name" class="form-control" placeholder="Enter role name">
                        </div>
                    </div>
                    <div class="col-lg-6">
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
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="role-tag" class="form-label">Tags</label>
                            <select class="form-control" id="choices-multiple-remove-button" data-choices data-choices-removeItem name="choices-multiple-remove-button" multiple>
                                <option value="Admin">Admin</option>
                                <option value="Manager">Manager</option>
                                <option value="Editor">Editor</option>
                                <option value="Viewer">Viewer</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="user-name" class="form-label">Users</label>
                            <select class="form-control" id="choices-multiple-remove-button-users" data-choices data-choices-removeItem name="choices-multiple-remove-button-users" multiple>
                                <option value="John Doe">John Doe</option>
                                <option value="Jane Smith">Jane Smith</option>
                                <option value="Mike Johnson">Mike Johnson</option>
                                <option value="Sarah Williams">Sarah Williams</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer border-top">
            <div class="d-flex gap-2">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-light">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Role</button>
            </div>
        </div>
    </div>
</div>
<!-- End Container Fluid -->
@endsection 