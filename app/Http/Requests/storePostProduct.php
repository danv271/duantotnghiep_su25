<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePostProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'base_price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            // 'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Tối đa 2MB
            // 'images' => 'required|array',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'variants' => 'required|array',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.quantity' => 'required|integer|min:0',
            'variants.*.status' => 'required|in:active,inactive',
            'variants.*.attributes' => 'required|array',
            'variants.*.attributes.*.attribute_id' => 'required|exists:attributes,id',
            'variants.*.attributes.*.attribute_value_id' => 'required|exists:attributes_values,id',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'base_price.required' => 'Giá cơ bản là bắt buộc.',
            'base_price.numeric' => 'Giá cơ bản phải là số.',
            'base_price.min' => 'Giá cơ bản không được nhỏ hơn 0.',
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists' => 'Danh mục không tồn tại.',
            'description.required' => 'Mô tả là bắt buộc.',
            // 'featured_image.required' => 'Hình ảnh nổi bật là bắt buộc.',
            // 'featured_image.image' => 'Tệp phải là hình ảnh.',
            // 'featured_image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc gif.',
            // 'featured_image.max' => 'Hình ảnh không được vượt quá 2MB.',
            // 'images.required' => 'Ít nhất một hình ảnh bổ sung là bắt buộc.',
            // 'images.*.image' => 'Tệp phải là hình ảnh.',
            // 'images.*.mimes' => 'Hình ảnh bổ sung phải có định dạng jpeg, png, jpg, hoặc gif.',
            // 'images.*.max' => 'Mỗi hình ảnh bổ sung không được vượt quá 2MB.',
            'variants.required' => 'Ít nhất một biến thể là bắt buộc.',
            'variants.*.price.required' => 'Giá của biến thể là bắt buộc.',
            'variants.*.price.numeric' => 'Giá của biến thể phải là số.',
            'variants.*.price.min' => 'Giá của biến thể không được nhỏ hơn 0.',
            'variants.*.quantity.required' => 'Số lượng của biến thể là bắt buộc.',
            'variants.*.quantity.integer' => 'Số lượng phải là số nguyên.',
            'variants.*.quantity.min' => 'Số lượng không được nhỏ hơn 0.',
            'variants.*.status.required' => 'Trạng thái của biến thể là bắt buộc.',
            'variants.*.status.in' => 'Trạng thái chỉ chấp nhận active hoặc inactive.',
            'variants.*.attributes.required' => 'Ít nhất một thuộc tính cho biến thể là bắt buộc.',
            'variants.*.attributes.*.attribute_id.required' => 'Thuộc tính là bắt buộc.',
            'variants.*.attributes.*.attribute_id.exists' => 'Thuộc tính không tồn tại.',
            'variants.*.attributes.*.attribute_value_id.required' => 'Giá trị thuộc tính là bắt buộc.',
            'variants.*.attributes.*.attribute_value_id.exists' => 'Giá trị thuộc tính không tồn tại.',
        ];
    }
}
