<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
      DB::table('products_collections')->insert([
            ['name' => 'Basic Wear', 'slug' => 'basic-wear'],
            ['name' => 'Summer 2026', 'slug' => 'summer-2026'],
        ]);
    }
}
