<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Rice, Lentils & Flour', 'icon' => '🌾'],
            ['name' => 'Oil, Ghee & Spices', 'icon' => '🧴'],
            ['name' => 'Vegetables', 'icon' => '🥦'],
            ['name' => 'Fruits', 'icon' => '🍎'],
            ['name' => 'Fish & Meat', 'icon' => '🐟'],
            ['name' => 'Dairy & Eggs', 'icon' => '🥚'],
            ['name' => 'Snacks & Beverages', 'icon' => '🍪'],
            ['name' => 'Home & Personal Care', 'icon' => '🧼'],
        ];

        $catModels = [];
        foreach ($categories as $i => $c) {
            $catModels[] = Category::create([
                'name' => $c['name'],
                'slug' => Str::slug($c['name']) ?: 'category-' . $i,
                'icon' => $c['icon'],
                'sort_order' => $i,
            ]);
        }

        $products = [
            [0, 'Premium Miniket Rice', '5 kg', 425, 470, true],
            [0, 'Nazirshail Rice', '5 kg', 395, null, false],
            [0, 'Red Lentils (Masoor Dal)', '1 kg', 135, 150, true],
            [1, 'Soybean Oil Bottle', '5 L', 965, 1020, true],
            [1, 'Pure Ghee', '500 g', 680, 750, true],
            [2, 'Potato', '1 kg', 30, null, true],
            [2, 'Red Onion', '1 kg', 75, 85, true],
            [3, 'Banana (Local)', '1 dozen', 90, null, false],
            [3, 'Apple (Fuji)', '1 kg', 240, 270, true],
            [4, 'Rohu Fish', '1 kg', 320, 360, true],
            [4, 'Broiler Chicken', '1 kg', 190, null, true],
            [5, 'Farm Eggs', '12 pcs', 145, 160, true],
            [5, 'Liquid Milk', '1 L', 90, null, false],
            [6, 'Coca-Cola', '1.5 L', 110, 120, false],
            [7, 'Detergent Powder', '1 kg', 215, 240, true],
            [7, 'Handwash', '250 ml', 135, 150, false],
        ];

        foreach ($products as $i => [$catIdx, $name, $unit, $price, $compare, $featured]) {
            Product::create([
                'category_id' => $catModels[$catIdx]->id,
                'name' => $name,
                'slug' => Str::slug($name) . '-' . ($i + 1),
                'unit' => $unit,
                'description' => 'Sourced from trusted, reliable suppliers — fresh, high-quality ' . $name . '.',
                'price' => $price,
                'compare_price' => $compare,
                'stock' => 50,
                'sku' => 'SB' . str_pad($i + 1, 5, '0', STR_PAD_LEFT),
                'is_featured' => $featured,
            ]);
        }
    }
}
