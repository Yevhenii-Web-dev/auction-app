<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Lot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(5)->create();

        Lot::factory(30)->create()->each(function ($lot) use($categories){
            $lot->categories()->attach($categories->random(rand(1,5)));
        });

    }
}
