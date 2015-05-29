<?php

use CodeCommerce\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder{
    public function run()
    {
        DB::table('products')->truncate();

        $faker = Faker::create();

        foreach (range(1, 15) as $i)
        {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat(2, 5, 10),
                'featured' => $faker->boolean(),
                'recommend' =>$faker->boolean()
            ]);
        }

    }


}