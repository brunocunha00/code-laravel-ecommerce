<?php

use CodeCommerce\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder{
    public function run()
    {
        DB::table('products')->truncate();

        $faker = Faker::create();

        foreach (range(1, 40) as $i)
        {
            Product::create([
                'category_id' => $faker->numberBetween(1, 15),
                'name' => $faker->word,
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat(2, 5, 10),
                'featured' => false,
                'recommend' => false
            ]);
        }

    }


}