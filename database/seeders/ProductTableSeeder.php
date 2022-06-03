<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::factory(120)->create();

        $faker = Faker::create();

        \App\Models\Product::all()->each(function ($product) use ($faker)
        {
            $product->slug = Str::slug($product->title, '-');
            $product->save();

            $categories = [];

            $i = 0;
            while($i < 4)
            {
                $categories[] = $faker->numberBetween( 1, 5 );
                $i++;
            }

            $product->categories()->sync($categories);

        });

    }
}
