<?php

use CodeCommerce\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder{
    public function run()
    {
        DB::table('users')->truncate();

        $faker = Faker::create();

        User::create([
            'name' => 'bruno',
            'email' => 'bruno@code.com',
            'password' => Hash::make(12345)
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@code.com',
            'is_admin' => 1,
            'password' => Hash::make(12345)
        ]);

        foreach (range(1, 5) as $i)
        {
            User::create([
                'name' => $faker->word,
                'email' => $faker->email,
                'password' => Hash::make($faker->word)
            ]);
        }

    }


}