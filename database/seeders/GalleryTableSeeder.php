<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::all()->each(function($product)
        {
            $product_id = $product->id;
//            \Log::info("TEST");
//            \Log::info($product_id);
            $gallery = \App\Models\Gallery::factory()->create();
//            \Log::info($gallery);
            $product->gallery()->save($gallery);
        });
    }
}
