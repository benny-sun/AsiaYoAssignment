<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 200) as $index) {
            DB::table('rooms')->insert([
                'name' => $faker->word . ' Room',
                'bnb_id' => $faker->numberBetween(1, 50), // 需確保與 BnbsTableSeeder 的數量一致
                'created_at' => $faker->dateTimeBetween('2023-01-01', '2023-02-01'),
                'updated_at' => $faker->dateTimeBetween('2023-01-01', '2023-02-01'),
            ]);
        }
    }
}
