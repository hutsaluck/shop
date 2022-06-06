<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Gallery::all()->each(function($gallery){
            $images = \App\Models\Image::factory(4)->create();
            $gallery->images()->saveMany($images);
        });
    }
}
