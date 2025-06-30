<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ?? 10;
        $attributes = Attribute::with('values')
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);
        return view('admin.attributes.index', compact('attributes'));
    }

    public function create()
    {
        return view('admin.attributes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255|unique:attributes',
            'values' => 'required|string'
        ], [
            'name.required' => 'Tên thuộc tính là bắt buộc',
            'name.min' => 'Tên thuộc tính phải có ít nhất 2 ký tự',
            'name.max' => 'Tên thuộc tính không được vượt quá 255 ký tự',
            'name.unique' => 'Tên thuộc tính này đã tồn tại',
            'values.required' => 'Giá trị thuộc tính là bắt buộc'
        ]);

        try {
            DB::beginTransaction();

            // Tạo thuộc tính mới
            $attribute = Attribute::create([
                'name' => trim($request->name)
            ]);

            // Xử lý các giá trị thuộc tính
            $values = array_map('trim', explode(',', $request->values));
            foreach ($values as $value) {
                if (!empty($value)) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'value' => $value
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.attributes.index')
                           ->with('success', 'Thêm thuộc tính thành công');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $attribute = Attribute::with('values')->findOrFail($id);
        return view('admin.attributes.edit', compact('attribute'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255|unique:attributes,name,'.$id,
            'values' => 'required|string'
        ], [
            'name.required' => 'Tên thuộc tính là bắt buộc',
            'name.min' => 'Tên thuộc tính phải có ít nhất 2 ký tự',
            'name.max' => 'Tên thuộc tính không được vượt quá 255 ký tự',
            'name.unique' => 'Tên thuộc tính này đã tồn tại',
            'values.required' => 'Giá trị thuộc tính là bắt buộc'
        ]);

        try {
            DB::beginTransaction();

            $attribute = Attribute::findOrFail($id);
            $attribute->update([
                'name' => trim($request->name)
            ]);

            // Xóa các giá trị cũ
            $attribute->values()->delete();

            // Thêm các giá trị mới
            $values = array_map('trim', explode(',', $request->values));
            foreach ($values as $value) {
                if (!empty($value)) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'value' => $value
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.attributes.index')
                           ->with('success', 'Cập nhật thuộc tính thành công');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $attribute = Attribute::findOrFail($id);
            $attribute->delete(); // Sẽ tự động xóa các values do đã setup cascade

            return redirect()->route('admin.attributes.index')
                           ->with('success', 'Xóa thuộc tính thành công');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
