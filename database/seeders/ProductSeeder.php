<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::create([
            'product_name' => Str::random(10),
            'price' => rand(2,100),
            'stock' => 'yes',
            'shop_id' => rand(2,100),
            'video' => Str::random(10).'.mp4'
        ]);   
    }
}
