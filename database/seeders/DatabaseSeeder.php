<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $response = Http::get("https://dummyjson.com/products/categories");
        if($response->successful()){
            $categories = $response->json();
            foreach($categories as $key => $category){
                Category::create([
                    'name' => $category['name'],
                    'slug' => $category['slug'],
                ]);
                $res = Http::get("https://dummyjson.com/products/category/{$category['slug']}");
                if($res->successful()){
                    $data = $res->json();
                    foreach($data['products'] as $item){
                        Product::create([
                            'title' => $item['title'],
                            'description' => $item['description'],
                            'price' => $item['price'],
                            'discountPercentage' => $item['discountPercentage'] < 10 ? null : $item['discountPercentage'],
                            'rating' => $item['rating'],
                            'stock' => $item['stock'],
                            'brand' => $item['brand'] ?? 'Unknown',
                            'tags' => json_encode($item['tags']),
                            'images' => json_encode($item['images']),
                            'reviews' => json_encode($item['reviews']),
                            'sku' => $item['sku'],
                            'thumbnail' => $item['thumbnail'],
                            'category_id' => $key + 1
                        ]);
                    }
                }
            }
        }
    }
}
