<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         {
        DB::table('product_colors')->insert([
            ['name' => 'Black', 'code' => '#000000'],
            ['name' => 'White', 'code' => '#ffffff'],
            ['name' => 'Beige', 'code' => '#f5f5dc'],
        ]);
        DB::table('product_size')->insert([
            ['name' => 'S'],
            ['name' => 'M'],
            ['name' => 'L'],
        ]);
        DB::table('product_materials')->insert([
            ['name' => 'Cotton'],
            ['name' => 'Denim'],
        ]);
    }
    }
}
