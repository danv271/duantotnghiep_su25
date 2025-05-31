@extends('admin.layouts.app')

@section('title', 'Edit Role')

@section('header', 'Edit Role')

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
                            <input type="text" id="roles-name" class="form-control" placeholder="Enter role name" value="Workspace Manager">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="workspace" class="form-label">Workspace</label>
                            <select class="form-control" id="workspace" data-choices data-choices-groups data-placeholder="Select Workspace">
                                <option value="">Select Workspace</option>
                                <option value="Facebook" selected>Facebook</option>
                                <option value="Slack">Slack</option>
                                <option value="Zoom">Zoom</option>
                                <option value="Analytics">Analytics</option>
                                <option value="Meet">Meet</option>
                                <option value="Mail">Mail</option>
                                <option value="Strip">Strip</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="role-tag" class="form-label">Tags</label>
                            <select class="form-control" id="choices-multiple-remove-button" data-choices data-choices-removeItem name="choices-multiple-remove-button" multiple>
                                <option value="Manager" selected>Manager</option>
                                <option value="Product">Product</option>
                                <option value="Data" selected>Data</option>
                                <option value="Designer">Designer</option>
                                <option value="Supporter">Supporter</option>
                                <option value="System Design">System Design</option>
                                <option value="QA">QA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="user-name" class="form-label">Users</label>
                            <select class="form-control" id="choices-multiple-remove-button-users" data-choices data-choices-removeItem name="choices-multiple-remove-button-users" multiple>
                                <option value="Gaston Lapierre" selected>Gaston Lapierre</option>
                                <option value="John Doe">John Doe</option>
                                <option value="Jane Smith">Jane Smith</option>
                                <option value="Mike Johnson">Mike Johnson</option>
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
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End Container Fluid -->
@endsection 