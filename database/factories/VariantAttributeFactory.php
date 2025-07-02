<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\VariantAttribute;
use App\Models\Variant;
use App\Models\AttributeValue;

class VariantAttributeFactory extends Factory
{
    protected $model = VariantAttribute::class;

    public function definition(): array
    {
        return [
            'variant_id' => Variant::inRandomOrder()->first()?->id ?? Variant::factory(),
            'attribute_value_id' => AttributeValue::inRandomOrder()->first()?->id ?? AttributeValue::factory(),
        ];
    }
}
