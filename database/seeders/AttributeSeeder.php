<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attribute;
use App\Models\AttributeValue;

class AttributeSeeder extends Seeder
{
    public function run()
    {
        $attributes = [
            'Màu sắc' => ['Đỏ', 'Xanh', 'Vàng', 'Trắng', 'Đen', 'Hồng', 'Tím', 'Cam', 'Nâu', 'Xám'],
            'Kích thước' => ['S', 'M', 'L', 'XL', 'XXL', '35', '36', '37', '38', '39', '40', '41', '42'],
            'Chất liệu' => ['Cotton', 'Polyester', 'Len', 'Da', 'Vải', 'Nhung', 'Lụa', 'Nỉ', 'Jean', 'Kaki'],
            'Kiểu dáng' => ['Slim fit', 'Regular fit', 'Loose fit', 'Oversize', 'Skinny', 'Straight', 'Boot cut'],
            'Mùa' => ['Xuân', 'Hạ', 'Thu', 'Đông', 'Tất cả các mùa'],
            'Xuất xứ' => ['Việt Nam', 'Trung Quốc', 'Hàn Quốc', 'Nhật Bản', 'Thái Lan', 'Mỹ', 'Ý', 'Pháp'],
            'Phong cách' => ['Casual', 'Formal', 'Sport', 'Vintage', 'Street wear', 'Basic', 'Luxury'],
            'Cổ áo' => ['Cổ tròn', 'Cổ V', 'Cổ tim', 'Cổ sơ mi', 'Cổ polo', 'Cổ lọ', 'Không cổ'],
            'Chiều dài tay' => ['Tay ngắn', 'Tay lỡ', 'Tay dài', 'Không tay', '3/4 tay'],
            'Họa tiết' => ['Trơn', 'Kẻ sọc', 'Hoa văn', 'Chấm bi', 'Caro', 'In hình', 'Thêu'],
            'Độ co giãn' => ['Không co giãn', 'Co giãn nhẹ', 'Co giãn tốt', 'Co giãn 4 chiều'],
            'Dịp' => ['Đi làm', 'Đi chơi', 'Dự tiệc', 'Thể thao', 'Đi biển', 'Hằng ngày'],
            'Độ dày' => ['Mỏng', 'Vừa', 'Dày', 'Rất dày'],
            'Kiểu túi' => ['Túi trước', 'Túi sau', 'Túi hộp', 'Túi khóa kéo', 'Không túi'],
            'Loại cạp' => ['Cạp cao', 'Cạp thường', 'Cạp thấp', 'Cạp chun'],
            'Kiểu khóa' => ['Khóa kéo', 'Cúc', 'Dây kéo', 'Khuy bấm', 'Dây buộc'],
            'Độ bóng' => ['Không bóng', 'Bóng nhẹ', 'Bóng vừa', 'Rất bóng'],
            'Độ mềm' => ['Cứng', 'Hơi cứng', 'Mềm', 'Rất mềm'],
            'Độ thấm hút' => ['Kém', 'Trung bình', 'Tốt', 'Rất tốt'],
            'Độ bền màu' => ['Thấp', 'Trung bình', 'Cao', 'Rất cao']
        ];

        foreach ($attributes as $name => $values) {
            $attribute = Attribute::create(['name' => $name]);

            foreach ($values as $value) {
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'value' => $value
                ]);
            }
        }
    }
}
