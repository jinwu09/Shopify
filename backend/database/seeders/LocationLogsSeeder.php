<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\locationLogs;

class LocationLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        locationLogs::upsert(
            [
                ['transaction_id' => 1,  'location_address' => fake()->sentence(10, true)],
                ['transaction_id' => 2,  'location_address' => fake()->sentence(10, true)],
                ['transaction_id' => 3,  'location_address' => fake()->sentence(10, true)],
                ['transaction_id' => 4,  'location_address' => fake()->sentence(10, true)],
                ['transaction_id' => 5,  'location_address' => fake()->sentence(10, true)],
                ['transaction_id' => 6,  'location_address' => fake()->sentence(10, true)],
                ['transaction_id' => 7,  'location_address' => fake()->sentence(10, true)],
                ['transaction_id' => 8,  'location_address' => fake()->sentence(10, true)],
                ['transaction_id' => 9,  'location_address' => fake()->sentence(10, true)],
            ],
            ['transaction_id', 'location_address']
        );
    }
}
