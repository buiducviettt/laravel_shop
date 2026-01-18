<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       DB::table('categories')->upsert(
        [
            [
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=1200&q=80',
                'name'  => 'T-Shirts',
                'slug'  => 't-shirts',
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=1200&q=80',
                'name'  => 'Shoes',
                'slug'  => 'shoes',
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=1200&q=80',
                'name'  => 'Pants',
                'slug'  => 'pants',
            ],
        ],
        ['slug'],          // 👈 uniqueBy (cột unique)
        ['name', 'image']  // 👈 update columns nếu bị trùng slug
    );
    }
}
