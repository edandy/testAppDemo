<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=1; $i < 5 ; $i++) {
            DB::table('products')->insert([
                'name' => $faker->name(),
                'price' => $faker->numberBetween(100, 500)
            ]);
        }
    }
}
