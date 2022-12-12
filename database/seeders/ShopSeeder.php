<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	for ($i=0; $i < 100; $i++) {
    		$shops[] = [
    			'shop_name' => Str::random(10),
	            'image' => Str::random(10).'.jpg',
	            'address' => Str::random(30),
	            'email' => Str::random(10).'@gmail.com'
    		];
    	}

    	foreach ($shops as $shop) {
            \App\Models\Shop::create($shop);
        }
    }
}
