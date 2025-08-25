<?php
namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function definition(): array
    {
        // Dùng đường dẫn thật để Faker có thể ghi file
        $realPath = storage_path('app/public/images/products');

        // Nếu thư mục chưa tồn tại thì tạo mới
        if (!is_dir($realPath)) {
            mkdir($realPath, 0755, true);
        }

        // Tạo ảnh và lấy tên file
        $filename = $this->faker->image($realPath, 640, 480, null, false);

        return [
            'product_id' => Product::inRandomOrder()->value('id'),
            'path' => 'images/products/' . basename($filename), // lưu đường dẫn sau /storage
            'is_featured' => $this->faker->boolean(20),
        ];
    }
}

