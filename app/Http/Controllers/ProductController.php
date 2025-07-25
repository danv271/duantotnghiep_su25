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
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // lấy danh sách sản phẩm với các quan hệ category, images và variants
        // sử dụng eager loading để giảm số lượng truy vấn và cải thiện hiệu suất
        $products = Product::with('category', 'images', 'variants.attributesValue.attribute')->orderBy('id','desc')->paginate(10);
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

        return redirect()->route('admin.products.list')->with('success', 'Sản phẩm được thêm thành công!');
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
        return view('admin.products.detail',compact('product','priceRange','categories','attributes','attributeValues'));
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
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        // Update basic product information
        $product->update([
            'name' => $request['name'],
            'base_price' => $request['base_price'],
            'category_id' => $request['category_id'],
            'description' => $request['description'],
        ]);

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            // Delete old featured image if exists
            $currentFeatured = $product->images()->where('is_featured', 1)->first();
            if ($currentFeatured) {
                Storage::delete($currentFeatured->path);
                $currentFeatured->delete();
            }

            // Upload new featured image
            $path = $request->file('featured_image')->store('uploads', 'public');
            $product->images()->create([
                'path' => $path,
                'is_featured' => 1,
            ]);
        }

        // Handle product images
        if ($request->hasFile('images')) {
            // Upload new images
            $newImages = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $newImages[] = [
                    'path' => $path,
                    'is_featured' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Use syncWithoutDetaching to add new images without removing existing ones
            $product->images()->createMany($newImages);
        }

        // Handle deleted images
        if ($request->filled('deleted_images')) {
            $deletedImageIds = explode(',', $request->input('deleted_images'));
            $imagesToDelete = $product->images()->whereIn('id', $deletedImageIds)->where('is_featured', 0)->get();
            
            foreach ($imagesToDelete as $image) {
                Storage::delete($image->path);
                $image->delete();
            }
        }

        return redirect()->route('admin.products.list')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function indexClient(Request $request, $categoryId = null)
    {
        // Khởi tạo query để lấy sản phẩm
        $query = Product::with('images');

        // Lấy danh mục cha và danh mục con
        $category = null;
        if ($categoryId) {
            $category = Category::findOrFail($categoryId);
            $childCategoryIds = Category::where('parent_category_id', $categoryId)
                ->pluck('id')
                ->push($categoryId)
                ->toArray();
            $query->whereIn('category_id', $childCategoryIds);
        }

        // Lọc theo tên sản phẩm
        if ($request->has('search') && !empty($request->input('search'))) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        // Lọc theo giá
        if ($request->has('min_price') && !empty($request->input('min_price'))) {
            $query->where('base_price', '>=', $request->input('min_price'));
        }
        if ($request->has('max_price') && !empty($request->input('max_price'))) {
            $query->where('base_price', '<=', $request->input('max_price'));
        }

        // Lọc theo danh mục con
        if ($request->has('sub_category') && !empty($request->input('sub_category'))) {
            $query->where('category_id', $request->input('sub_category'));
        }

        // Lấy danh sách sản phẩm với phân trang
        $products = $query->paginate(10); // Sử dụng paginate thay vì get

        // Lấy tất cả danh mục cha và danh mục con
        $categories = Category::whereNull('parent_category_id')->with('children')->get();

        // Trả về view
        return view('category', compact('products', 'categories', 'category'));
    }


   public function showClient($id)
{
    $product = Product::with(['variants.attributesValue.attribute', 'images'])->findOrFail($id);
    $totalProduct = 0;
    foreach($product->variants as $variant){
        $totalProduct += $variant->stock_quantity;
    }
    return view('product-detail', compact('product','totalProduct'));
}

}
    