<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Mountain Bikes',
                'description' => 'Off-road bicycles designed for rough terrain and mountain trails.',
                'meta_title' => 'Mountain Bikes - Cycles Aland',
                'meta_description' => 'Explore our collection of mountain bikes perfect for off-road adventures and trail riding.',
            ],
            [
                'name' => 'Hybrid Bikes',
                'description' => 'Versatile bicycles suitable for both road and light off-road use.',
                'meta_title' => 'Hybrid Bikes - Cycles Aland',
                'meta_description' => 'Discover hybrid bicycles that combine the best of road and mountain bikes.',
            ],
            [
                'name' => 'Electric Bikes',
                'description' => 'Motor-assisted bicycles for easier commuting and longer rides.',
                'meta_title' => 'Electric Bikes - Cycles Aland',
                'meta_description' => 'Experience the future of cycling with our electric bike collection.',
            ],
            [
                'name' => 'Kids Bikes',
                'description' => 'Specially designed bicycles for children of all ages.',
                'meta_title' => 'Kids Bikes - Cycles Aland',
                'meta_description' => 'Find the perfect bicycle for your child from our kids bike collection.',
            ],
            [
                'name' => 'Road Bikes',
                'description' => 'Lightweight bicycles designed for speed on paved roads.',
                'meta_title' => 'Road Bikes - Cycles Aland',
                'meta_description' => 'High-performance road bikes for speed and efficiency on paved surfaces.',
            ],
            [
                'name' => 'City Bikes',
                'description' => 'Comfortable bicycles perfect for urban commuting and daily use.',
                'meta_title' => 'City Bikes - Cycles Aland',
                'meta_description' => 'Comfortable and practical city bicycles for daily commuting.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
