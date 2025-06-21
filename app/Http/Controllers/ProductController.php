<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePostProduct;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\productsImage;
use App\Models\Variants;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // lấy danh sách sản phẩm với các quan hệ category, images và variants
        // sử dụng eager loading để giảm số lượng truy vấn và cải thiện hiệu suất
        $products = Product::with('category', 'images', 'variants.attributesValue.attribute')->paginate(10);
        return view('admin.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // lấy danh sách danh mục,thuộc tính và giá trị thuộc tính để hiển thị trong form tạo sản phẩm
        $categories = Category::all();
        $attributes = Attribute::with('attributesValues')->get();
        // mảng giá trị chứa các giá trị thuộc tính, mỗi giá trị có id và value
        $attributeValues = [];
        foreach($attributes as $attribute){
            foreach($attribute->attributesValues as $value){
                $attributeValues[] = (object) [
                    'attribute_value_id' => $value->id,
                    'value' => $value->value
                ];
            }
        }
        return view('admin.products.create',compact('categories','attributes','attributeValues'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(storePostProduct $request)
    {
        //
        $validatedData = $request->validated();

        // Lưu sản phẩm
        $product = Product::create([
            'name' => $validatedData['name'],
            'base_price' => $validatedData['base_price'],
            'category_id' => $validatedData['category_id'],
            'description' => $validatedData['description'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Lưu hình ảnh nổi bật
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('uploads','public');
            productsImage::create([
                'product_id' => $product->id,
                'path' => $path,
                'is_featured' => 1,
            ]);
        }

        // // Lưu hình ảnh bổ sung
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads', 'public');
                productsImage::create([
                    'product_id' => $product->id,
                    'path' => $path,
                    'is_featured' => 0,
                ]);
            }
        }

        // Lưu biến thể
        foreach ($validatedData['variants'] as $variantData) {
            $variant = Variants::create([
                'product_id' => $product->id,
                'price' => $variantData['price'],
                'stock_quantity' => $variantData['quantity'],
                'status' => $variantData['status'],
            ]);

            // Lưu thuộc tính của biến thể (giả sử có bảng pivot)
            foreach ($variantData['attributes'] as $attribute) {
                $variant->attributesValue()->attach($attribute['attribute_id'], [
                    'variant_id' => $variant->id,
                    'attribute_value_id' => $attribute['attribute_value_id']
                ]);
            }
        }

        return redirect()->route('admin.products-list')->with('success', 'Sản phẩm được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //lấy thông tin sản phẩm
        $product = Product::with('category','images','variants.attributesValue.attribute')->find($id);
        $priceRange = [
            "min" => $product->variants->pluck('price')->min(),
            "max" => $product->variants->pluck('price')->max()
        ];
        return view('admin.products.detail',compact('product','priceRange'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::with('category','images','variants.attributesValue.attribute')->find($id);
        $categories = Category::all();
        $attributes = Attribute::with('attributesValues')->get();
        $images = [];
        $featuredImage='';
        $attributeValues = [];
        foreach($attributes as $attribute){
            foreach($attribute->attributesValues as $value){
                $attributeValues[] = (object) [
                    'id' => $value->id,
                    'value' => $value->value
                ];
            }
        }
        foreach($product->images as $image){
            if($image->is_featured == 1){
                $featuredImage = $image->path;
            }else{
                $images [] = $image->path;
            }
            
        }
        return view('admin.products.edit',compact('product','categories','featuredImage','images','attributes','attributeValues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storePostProduct $request, string $id)
    {
        $product = Product::findOrFail($id);
        $validatedData = $request->validated();

        // Cập nhật thông tin cơ bản
        $product->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'base_price' => $validatedData['base_price'],
            'category_id' => $validatedData['category_id']
        ]);

        // // Xử lý ảnh nổi bật
        // $existingFeaturedImages = $request->input('existing_featured_image', []);
        // $newFeaturedImages = $request->file('new_featured_image');
        // $deletedImageIds = $request->input('deleted_images', []);

        // if ($newFeaturedImages) {
        //     foreach ($newFeaturedImages as $image) {
        //         $imageUrl = $image->store('products', 'public');
        //         Image::create([
        //             'product_id' => $product->id,
        //             'image_url' => $imageUrl,
        //             'is_primary' => 1, // Lưu ý: Có thể cần logic để chọn ảnh chính
        //         ]);
        //     }
        // }

        // foreach ($deletedImageIds as $imageId) {
        //     $image = Image::find($imageId);
        //     if ($image) {
        //         Storage::disk('public')->delete($image->image_url);
        //         $image->delete();
        //     }
        // }

        // // Xử lý ảnh sản phẩm bổ sung
        // $existingProductImages = $request->input('existing_product_images', []);
        // $newProductImages = $request->file('new_product_images') ? $request->file('new_product_images')->map(function ($file) {
        //     return $file->store('products', 'public');
        // })->toArray() : [];

        // foreach ($newProductImages as $imageUrl) {
        //     Image::create([
        //         'product_id' => $product->id,
        //         'image_url' => $imageUrl,
        //         'is_primary' => 0,
        //     ]);
        // }

        // Xử lý biến thể
        // lấy giá trị của 1 khóa cụ thể từ dữ liệu được gửi lên qua Request HTTP
        $variantsData = $request->input('variants', []); //
        // lấy danh sách ID của tất cả biến thể thuộc sản phẩm và chuyển thành mảng
        $existingVariantIds = $product->variants->pluck('id')->toArray();
        // lặp qua dữ liệu được lấy từ khóa được gửi lên qua Request HTTP
        foreach ($variantsData as $index => $variantData) {
            // kiểm tra id có tồn tại hay không
            // nếu tồn tại thì gán giá trị cho variantId
            // nếu không thì gán null cho variantId
            $variantId = isset($variantData['id']) ? $variantData['id'] : null;
            
            // kiểm tra varriantId có null không và có tồn tại trong danh sách biến thể không
            if ($variantId && in_array($variantId, $existingVariantIds)) {
                // nếu đúng
                // Cập nhật biến thể hiện có
                $variant = Variants::find($variantId);
                $variant->update([
                    'price' => $variantData['price'],
                    'stock_quantity' => $variantData['quantity'],
                    'status' => $variantData['status'],
                ]);
            } else {
                // nếu không
                // Tạo biến thể mới nếu chưa tồn tại
                $variant = Variants::create([
                    'product_id' => $product->id,
                    'price' => $variantData['price'],
                    'stock_quantity' => $variantData['quantity'],
                    'status' => $variantData['status'],
                ]);
            }

            // Xử lý thuộc tính của biến thể
            // lấy dữ liệu từ 1 khóa cụ thể từ Request HTTP
            // Lấy danh sách dữ liệu thuộc tính, mặc định là mảng rỗng
            $attributesData = $variantData['attributes'] ?? [];

            // Mảng để lưu các ID attribute_value_id cần đồng bộ
            $attributeValueIds = [];

            // Duyệt qua dữ liệu thuộc tính
            foreach ($attributesData as $attributeData) {
                $attributeData = array_filter($attributeData);
                $attributeValueId = $attributeData['attribute_value_id'] ?? null;
                $attributeId = $attributeData['attribute_id'] ?? null;

                // Kiểm tra dữ liệu đầu vào
                if ($attributeValueId && $attributeId) {
                    // Kiểm tra sự tồn tại của AttributeValue và Attribute (tùy chọn)
                    if (AttributeValue::where('id', $attributeValueId)->where('attribute_id', $attributeId)->exists()) {
                        $attributeValueIds[] = $attributeValueId;
                    }
                }
            }

            // Đồng bộ các attribute_value_id với bảng trung gian
            $variant->attributesValue()->sync($attributeValueIds);

// Xóa các attribute_value_id không còn trong danh sách
// (sync sẽ tự động xóa các bản ghi không có trong $attributeValueIds)

            // Xóa thuộc tính không còn trong request
            // $variant->attributesValue()->whereNotIn('id', Arr::pluck($attributesData, 'id'))->delete();
        }

        // Xóa biến thể không còn trong request
        // $product->variants()->whereNotIn('id', Arr::pluck($variantsData, 'id'))->delete();

        return redirect()->route('admin.products-list')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function indexClient()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }


    public function showClient($id)
    {
        $product = Product::findOrFail($id);
        return view('product-detail', compact('product'));
    }
}
