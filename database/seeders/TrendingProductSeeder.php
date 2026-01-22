<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrendingProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
   {
        // lấy 10 sản phẩm mới nhất (hoặc bạn có thể where theo category)
        $productIds = DB::table('products')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->pluck('id');

        if ($productIds->count() < 10) {
            throw new \Exception("Chưa đủ 10 products. Hiện tại chỉ có: " . $productIds->count());
        }

        DB::table('trending_products')->truncate();

        // Layout + image tương ứng
        $items = [
            [
                'type'  => 'tall',
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'type'  => 'wide',
                'image' => 'https://images.unsplash.com/photo-1523381294911-8d3cead13475?auto=format&fit=crop&w=1600&q=80',
            ],
            [
                'type'  => 'short',
                'image' => 'https://images.unsplash.com/photo-1618354691373-d851c5c3a990?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'type'  => 'short',
                'image' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'type'  => 'tall',
                'image' => 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'type'  => 'wide',
                'image' => 'https://images.unsplash.com/photo-1542060748-10c28b62716f?auto=format&fit=crop&w=1600&q=80',
            ],
            [
                'type'  => 'short',
                'image' => 'https://images.unsplash.com/photo-1532453288672-3a27e9be9efd?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'type'  => 'tall',
                'image' => 'https://images.unsplash.com/photo-1520975958225-1d09f12fdd3c?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'type'  => 'short',
                'image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'type'  => 'wide',
                'image' => 'https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&w=1600&q=80',
            ],
        ];
        foreach ($items as $i => $item) {
            DB::table('trending_products')->insert([
                'product_id' => $productIds[$i],
                'image'      => $item['image'],
                'type'       => $item['type'],
                'priority'   => $i + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
