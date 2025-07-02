<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use App\Models\Variants;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $variantsData = $request->input('variants', []);
        $attributeValues = $request->input('variants', []);
        $test = $attributeValues;
        // Lặp qua từng biến thể
        foreach ($variantsData as $index => $variantData) {
            // Tạo mới biến thể
            $variant = Variants::create([
                'product_id' => $request['productID'],
                'price' => $variantData['price'],
                'stock_quantity' => $variantData['quantity'],
                'status' => $variantData['status'],
            ]);

            // Chuẩn bị dữ liệu để đồng bộ hóa thuộc tính
            $attributesData = [];
            foreach ($variantData['attribute_value_id' ] as $attributeValueId) {
                // Kiểm tra xem attribute_value_id có phải là số (ID) hay chuỗi (giá trị mới)
                // Thêm vào mảng để đồng bộ
                if ($attributeValueId) {
                    $attributesData[$attributeValueId] = ['attribute_value_id' => $attributeValueId];
                }
            }

            // Đồng bộ hóa mà không xóa các bản ghi hiện có
            $variant->attributesValue()->syncWithoutDetaching($attributesData);
        }
        return redirect()->back()->with('success', 'Biến thể đã được thêm thành công!');
        //return view('admin.products.test',compact('test'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
            // lấy ra sản phẩm có id
            $variant = Variants::findOrFail($id);

            // cập nhật thông tin cơ bản của biến thể
            $variant->update([
                'price' => $request['price'],
                'stock_quantity' => $request['quantity'],
                'status' => $request['status'],
            ]);

            $attributesData = [];
            foreach ($request->input('attribute_value', []) as $index => $attributeValueId) {
                // Kiểm tra xem attribute_value_id có phải là số (ID) hay chuỗi (giá trị mới)
                if (is_numeric($attributeValueId)) {
                    // Nếu là ID, kiểm tra xem attribute_value có tồn tại
                    $attributeValue = AttributeValue::find($attributeValueId);
                    $attributeValueId = $attributeValue ? $attributeValue->id : null;
                }
                // Thêm vào mảng để đồng bộ
                if ($attributeValueId) {
                    $attributesData[$attributeValueId] = ['attribute_value_id' => $request->input("attribute_value.$index")];
                }
            }

            // Đồng bộ hóa mà không xóa các bản ghi hiện có
            $variant->attributesValue()->sync($attributesData);
            // return view('admin.products.test',compact('test'));
            return redirect()->back()->with('success', 'Variant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $variant = Variants::find($id);
        return redirect()->route('admin.products-detail',$variant->product_id)->with('success', 'Xóa thành công!');
    }
}
