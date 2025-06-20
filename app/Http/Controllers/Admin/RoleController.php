<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roles;
    protected $user;
    public function __construct()
    {
        // Khởi tạo mô hình Roles nếu cần thiết
        $this->roles = new Roles();
        $this->user = new User();
    }
    //
    public function index()
    {
        // Lấy danh sách các vai trò
        $data = $this->roles->paginate(10);
        // dd($data); // Hiển thị dữ liệu để kiểm tra

        return view('admin.roles.index', compact('data'));
    }
    public function create()
    {
        // Hiển thị form tạo vai trò mới
        // $data  = User::all();
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        // Xử lý lưu vai trò mới
        $dataValidate = $request->validate([
            'role_name' => 'required|string|max:255|unique:roles,role_name',
            'description' => 'nullable|string|max:500',
        ]);
        dd($dataValidate);
        if ($dataValidate) {
            $lastInsertId = Roles::create($dataValidate);
            return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
        } else {
            return view('admin.roles.create');
        }
    }

    public function show($id)
    {
        $role = Roles::findOrFail($id);
        // dd($role->users);
        if ($role) {
            return view('admin.roles.show', compact('role'));
        }
    }
    public function edit($id)
    {
        $data = Roles::findOrFail($id);
        $listUser = User::all();
        if ($data) {
            return view('admin.roles.edit', compact('data', 'listUser'));
        }
    }
    public function update(Request $request, $id)
    {
        $dataValidate = $request->validate([
            'role_name' => 'required|string|max:255|unique:roles,role_name,' . $id,
            'description' => 'nullable|string|max:500',
        ]);
        $role = Roles::findOrFail($id);
        if ($role) {
            $role->update($dataValidate);
            if ($request->has('user_id')) {
                $user = User::findOrFail($request->user_id);
                // Kiểm tra xem người dùng có thuộc vai trò này không
                if ($user->id != $role->id) {
                    $user->update(['role_id' => $role->id]);
                }
            }
            return redirect()->route('admin.roles.index')->with('success', 'Update success');
        } else {
            return redirect()->route('admin.roles.edit');
        }
    }
}
