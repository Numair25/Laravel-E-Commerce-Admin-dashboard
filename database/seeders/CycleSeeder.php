<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        $cycles = [
            [
                'name' => 'Hero Sprint Pro Mountain Bike',
                'brand' => 'Hero',
                'type' => 'Gear',
                'price' => 15999.00,
                'description' => 'Professional mountain bike with 21-speed Shimano gears, perfect for off-road adventures and trail riding. Features a sturdy aluminum frame and reliable disc brakes.',
                'specifications' => "Frame: Aluminum\nGears: 21-speed Shimano\nBrakes: Disc brakes\nWheel Size: 26 inches\nWeight: 14.5 kg\nSuitable for: Adults",
                'stock_status' => 'In Stock',
                'meta_title' => 'Hero Sprint Pro Mountain Bike - Cycles',
                'meta_description' => 'Professional mountain bike with 21-speed Shimano gears, perfect for off-road adventures.',
                'category_id' => $categories->where('name', 'Mountain Bikes')->first()->id,
                'is_published' => true,
            ],
            [
                'name' => 'Atlas Hybrid Comfort Bike',
                'brand' => 'Atlas',
                'type' => 'Gear',
                'price' => 12999.00,
                'description' => 'Comfortable hybrid bike suitable for both city commuting and light off-road use. Features a comfortable saddle and upright riding position.',
                'specifications' => "Frame: Steel\nGears: 18-speed\nBrakes: V-brakes\nWheel Size: 28 inches\nWeight: 16 kg\nSuitable for: Adults",
                'stock_status' => 'In Stock',
                'meta_title' => 'Atlas Hybrid Comfort Bike - Cycles',
                'meta_description' => 'Comfortable hybrid bike perfect for city commuting and light off-road use.',
                'category_id' => $categories->where('name', 'Hybrid Bikes')->first()->id,
                'is_published' => true,
            ],
            [
                'name' => 'Avon Electric City Bike',
                'brand' => 'Avon',
                'type' => 'Electric',
                'price' => 45999.00,
                'description' => 'Electric city bike with pedal assist technology, making commuting easier and more enjoyable. Features a removable battery and LED display.',
                'specifications' => "Frame: Aluminum\nMotor: 250W Hub Motor\nBattery: 36V 10.4Ah\nRange: 40-60 km\nMax Speed: 25 km/h\nWeight: 22 kg",
                'stock_status' => 'In Stock',
                'meta_title' => 'Avon Electric City Bike - Cycles',
                'meta_description' => 'Electric city bike with pedal assist technology for easier commuting.',
                'category_id' => $categories->where('name', 'Electric Bikes')->first()->id,
                'is_published' => true,
            ],
            [
                'name' => 'Hero Kids Fun Bike',
                'brand' => 'Hero',
                'type' => 'Kids',
                'price' => 5999.00,
                'description' => 'Safe and fun bicycle designed specifically for children. Features training wheels, colorful design, and child-friendly components.',
                'specifications' => "Frame: Steel\nGears: Single speed\nBrakes: Coaster brake\nWheel Size: 16 inches\nWeight: 8 kg\nSuitable for: Ages 4-6",
                'stock_status' => 'In Stock',
                'meta_title' => 'Hero Kids Fun Bike - Cycles',
                'meta_description' => 'Safe and fun bicycle designed specifically for children with training wheels.',
                'category_id' => $categories->where('name', 'Kids Bikes')->first()->id,
                'is_published' => true,
            ],
            [
                'name' => 'BSA Road Runner Pro',
                'brand' => 'BSA',
                'type' => 'Gear',
                'price' => 18999.00,
                'description' => 'High-performance road bike designed for speed and efficiency on paved roads. Features lightweight frame and aerodynamic design.',
                'specifications' => "Frame: Aluminum\nGears: 21-speed Shimano\nBrakes: Rim brakes\nWheel Size: 28 inches\nWeight: 12 kg\nSuitable for: Adults",
                'stock_status' => 'In Stock',
                'meta_title' => 'BSA Road Runner Pro - Cycles',
                'meta_description' => 'High-performance road bike designed for speed and efficiency on paved roads.',
                'category_id' => $categories->where('name', 'Road Bikes')->first()->id,
                'is_published' => true,
            ],
            [
                'name' => 'Atlas City Cruiser',
                'brand' => 'Atlas',
                'type' => 'Non-Gear',
                'price' => 8999.00,
                'description' => 'Comfortable city cruiser perfect for daily commuting and leisurely rides. Features a comfortable upright position and practical design.',
                'specifications' => "Frame: Steel\nGears: Single speed\nBrakes: V-brakes\nWheel Size: 28 inches\nWeight: 15 kg\nSuitable for: Adults",
                'stock_status' => 'In Stock',
                'meta_title' => 'Atlas City Cruiser - Cycles',
                'meta_description' => 'Comfortable city cruiser perfect for daily commuting and leisurely rides.',
                'category_id' => $categories->where('name', 'City Bikes')->first()->id,
                'is_published' => true,
            ],
            [
                'name' => 'Hero Electric Mountain E-Bike',
                'brand' => 'Hero',
                'type' => 'Electric',
                'price' => 52999.00,
                'description' => 'Electric mountain bike combining the thrill of off-road riding with electric assistance. Perfect for adventure seekers.',
                'specifications' => "Frame: Aluminum\nMotor: 500W Hub Motor\nBattery: 48V 13Ah\nRange: 50-70 km\nMax Speed: 25 km/h\nWeight: 25 kg",
                'stock_status' => 'Out of Stock',
                'meta_title' => 'Hero Electric Mountain E-Bike - Cycles',
                'meta_description' => 'Electric mountain bike combining off-road riding with electric assistance.',
                'category_id' => $categories->where('name', 'Electric Bikes')->first()->id,
                'is_published' => true,
            ],
            [
                'name' => 'BSA Kids Mountain Explorer',
                'brand' => 'BSA',
                'type' => 'Kids',
                'price' => 7999.00,
                'description' => 'Kids mountain bike designed for young adventurers. Features sturdy construction and child-safe components.',
                'specifications' => "Frame: Steel\nGears: 6-speed\nBrakes: V-brakes\nWheel Size: 20 inches\nWeight: 10 kg\nSuitable for: Ages 7-10",
                'stock_status' => 'In Stock',
                'meta_title' => 'BSA Kids Mountain Explorer - Cycles',
                'meta_description' => 'Kids mountain bike designed for young adventurers with sturdy construction.',
                'category_id' => $categories->where('name', 'Kids Bikes')->first()->id,
                'is_published' => true,
            ],
        ];

        foreach ($cycles as $cycle) {
            Product::create($cycle);
        }
    }
}
