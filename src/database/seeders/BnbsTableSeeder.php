<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BnbsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 50) as $index) {
            DB::table('bnbs')->insert([
                'name' => $faker->company . ' BnB',
                'created_at' => $faker->dateTimeBetween('2022-04-01', '2022-07-01'),
                'updated_at' => $faker->dateTimeBetween('2022-04-01', '2022-07-01'),
            ]);
        }
    }
}
