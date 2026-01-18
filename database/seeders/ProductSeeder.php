<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categoryId   = DB::table('categories')->where('slug', 't-shirts')->value('id');
        $collectionId = DB::table('products_collections')->where('slug', 'basic-wear')->value('id');

        if (!$categoryId) {
            throw new \Exception("Không tìm thấy category slug=t-shirts");
        }

        // load option ids
        $colors   = DB::table('product_colors')->pluck('id');
        $sizes    = DB::table('product_size')->pluck('id'); // ✅ nên là product_sizes
        $material = DB::table('product_materials')->where('name', 'Cotton')->value('id');

        $products = [
            [
                'name'        => 'Basic Cotton T-Shirt',
                'slug'        => 'basic-cotton-t-shirt',
                'description' => 'Áo thun cotton form basic, dễ phối đồ, mặc hằng ngày.',
                'base_price'  => 199000,
                'images' => [
                    [
                        'image_url' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=1200&q=80',
                        'is_main'   => true,
                        'sort_order'=> 1,
                    ],
                    [
                        'image_url' => 'https://images.unsplash.com/photo-1618354691373-d851c5c3a990?auto=format&fit=crop&w=1200&q=80',
                        'is_main'   => false,
                        'sort_order'=> 2,
                    ],
                ],
            ],

            // ✅ Thêm sản phẩm thứ 2 ở đây
            [
                'name'        => 'Oversized T-Shirt',
                'slug'        => 'oversized-t-shirt',
                'description' => 'Áo thun form rộng streetwear.',
                'base_price'  => 249000,
                'images' => [
                    [
                        'image_url' => 'https://images.unsplash.com/photo-1523381294911-8d3cead13475?auto=format&fit=crop&w=1200&q=80',
                        'is_main'   => true,
                        'sort_order'=> 1,
                    ],
                ],
            ],
        ];

        foreach ($products as $p) {

            // 1) Product: updateOrInsert để chạy lại seed không bị trùng slug
            DB::table('products')->updateOrInsert(
                ['slug' => $p['slug']],
                [
                    'category_id'   => $categoryId,
                    'collection_id' => $collectionId,
                    'name'          => $p['name'],
                    'description'   => $p['description'],
                    'image'         => null,
                    'base_price'    => $p['base_price'],
                    'is_active'     => true,
                    'updated_at'    => now(),
                    'created_at'    => now(),
                ]
            );

            $productId = DB::table('products')->where('slug', $p['slug'])->value('id');

            // 2) Images (seed lại không bị trùng)
            if (DB::getSchemaBuilder()->hasTable('product_images')) {
                foreach ($p['images'] as $img) {
                    DB::table('product_images')->updateOrInsert(
                        [
                            'product_id' => $productId,
                            'image_url'  => $img['image_url'],
                        ],
                        [
                            'is_main'    => $img['is_main'] ?? false,
                            'sort_order' => $img['sort_order'] ?? 0,
                            'updated_at' => now(),
                            'created_at' => now(),
                        ]
                    );
                }
            }

            // 3) Variants (seed lại không bị trùng)
            foreach ($colors as $colorId) {
                foreach ($sizes as $sizeId) {

                    DB::table('products_variants')->updateOrInsert(
                        [
                            'product_id' => $productId,
                            'color_id'   => $colorId,
                            'size_id'    => $sizeId,
                        ],
                        [
                            'material_id' => $material,
                            'price'       => $p['base_price'],
                            'stock'       => rand(10, 50),
                            'sku'         => 'TS-' . strtoupper(Str::random(8)),
                            'updated_at'  => now(),
                            'created_at'  => now(),
                        ]
                    );
                }
            }
        }
    }
}
