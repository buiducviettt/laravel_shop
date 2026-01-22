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

    [
        'name'        => 'Oversized Streetwear T-Shirt',
        'slug'        => 'oversized-streetwear-t-shirt',
        'description' => 'Áo thun form rộng phong cách streetwear, mặc cực thoải mái.',
        'base_price'  => 249000,
        'images' => [
            [
                'image_url' => 'https://images.unsplash.com/photo-1523381294911-8d3cead13475?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => true,
                'sort_order'=> 1,
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => false,
                'sort_order'=> 2,
            ],
        ],
    ],

    [
        'name'        => 'Premium Heavyweight Tee',
        'slug'        => 'premium-heavyweight-tee',
        'description' => 'Áo thun dày dặn premium, đứng form, mặc sang.',
        'base_price'  => 299000,
        'images' => [
            [
                'image_url' => 'https://images.unsplash.com/photo-1542060748-10c28b62716f?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => true,
                'sort_order'=> 1,
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => false,
                'sort_order'=> 2,
            ],
        ],
    ],

    [
        'name'        => 'Minimal Logo T-Shirt',
        'slug'        => 'minimal-logo-t-shirt',
        'description' => 'Áo thun minimal in logo nhỏ, dễ phối với mọi outfit.',
        'base_price'  => 229000,
        'images' => [
            [
                'image_url' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => true,
                'sort_order'=> 1,
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1520975958225-1d09f12fdd3c?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => false,
                'sort_order'=> 2,
            ],
        ],
    ],

    [
        'name'        => 'Relax Fit T-Shirt',
        'slug'        => 'relax-fit-t-shirt',
        'description' => 'Áo thun relax fit rộng vừa đủ, mặc mát và thoáng.',
        'base_price'  => 219000,
        'images' => [
            [
                'image_url' => 'https://images.unsplash.com/photo-1532453288672-3a27e9be9efd?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => true,
                'sort_order'=> 1,
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => false,
                'sort_order'=> 2,
            ],
        ],
    ],

    [
        'name'        => 'Vintage Wash Tee',
        'slug'        => 'vintage-wash-tee',
        'description' => 'Áo thun wash vintage, màu loang nhẹ đẹp kiểu retro.',
        'base_price'  => 279000,
        'images' => [
            [
                'image_url' => 'https://images.unsplash.com/photo-1520975682031-ae3e4b192a4b?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => true,
                'sort_order'=> 1,
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1516826957135-700dedea698c?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => false,
                'sort_order'=> 2,
            ],
        ],
    ],

    [
        'name'        => 'Graphic Print T-Shirt',
        'slug'        => 'graphic-print-t-shirt',
        'description' => 'Áo thun in graphic nổi bật, hợp đi chơi / streetstyle.',
        'base_price'  => 259000,
        'images' => [
            [
                'image_url' => 'https://images.unsplash.com/photo-1520975437871-3ca1ca6c1661?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => true,
                'sort_order'=> 1,
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1556906781-9a412961c28c?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => false,
                'sort_order'=> 2,
            ],
        ],
    ],

    [
        'name'        => 'Slim Fit T-Shirt',
        'slug'        => 'slim-fit-t-shirt',
        'description' => 'Áo thun ôm nhẹ (slim fit), tôn dáng, mặc gọn gàng.',
        'base_price'  => 189000,
        'images' => [
            [
                'image_url' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => true,
                'sort_order'=> 1,
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1520975869010-8d8c2de9ae89?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => false,
                'sort_order'=> 2,
            ],
        ],
    ],

    [
        'name'        => 'Essential Daily Tee',
        'slug'        => 'essential-daily-tee',
        'description' => 'Áo thun essentials mặc đi học/đi làm, đơn giản dễ phối.',
        'base_price'  => 179000,
        'images' => [
            [
                'image_url' => 'https://images.unsplash.com/photo-1520975599462-6b5390db4970?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => true,
                'sort_order'=> 1,
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1503341504253-dff4815485f1?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => false,
                'sort_order'=> 2,
            ],
        ],
    ],

    [
        'name'        => 'Soft Touch Cotton Tee',
        'slug'        => 'soft-touch-cotton-tee',
        'description' => 'Áo thun cotton mềm mịn, mặc cực êm và ít nhăn.',
        'base_price'  => 239000,
        'images' => [
            [
                'image_url' => 'https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => true,
                'sort_order'=> 1,
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&w=1200&q=80',
                'is_main'   => false,
                'sort_order'=> 2,
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
