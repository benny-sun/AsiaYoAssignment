<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 5000) as $index) {
            DB::table('orders')->insert([
                'bnb_id' => $faker->numberBetween(1, 50), // 需確保與 BnbsTableSeeder 的數量一致
                'room_id' => $faker->numberBetween(1, 200), // 需確保與 RoomsTableSeeder 的數量一致
                'currency' => $faker->randomElement(['TWD', 'USD', 'JPY']),
                'amount' => $faker->randomFloat(2, 100, 10000),
                'check_in_date' => $faker->dateTimeBetween('2023-08-01', '2023-09-01'),
                'check_out_date' => $faker->dateTimeBetween('2023-09-20', '2023-12-01'),
                'created_at' => $faker->dateTimeBetween('2023-04-01', '2023-07-01'),
            ]);
        }
    }
}
