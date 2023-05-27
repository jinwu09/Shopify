<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_id = User::first();
        Item::upsert(
            [
                ['name' => fake()->domainName(), 'price' => 55, 'seller_id' => $user_id->id, 'description' => fake()->sentence(10, true), 'weight' => fake()->numberBetween(10, 300)],
                ['name' => fake()->domainName(), 'price' => 525, 'seller_id' => $user_id->id, 'description' => fake()->sentence(10, true), 'weight' => fake()->numberBetween(10, 300)],
                ['name' => fake()->domainName(), 'price' => 525, 'seller_id' => $user_id->id, 'description' => fake()->sentence(10, true), 'weight' => fake()->numberBetween(10, 300)],
                ['name' => fake()->domainName(), 'price' => 525, 'seller_id' => $user_id->id, 'description' => fake()->sentence(10, true), 'weight' => fake()->numberBetween(10, 300)],
                ['name' => fake()->domainName(), 'price' => 525, 'seller_id' => $user_id->id, 'description' => fake()->sentence(10, true), 'weight' => fake()->numberBetween(10, 300)],
                ['name' => fake()->domainName(), 'price' => 525, 'seller_id' => $user_id->id, 'description' => fake()->sentence(10, true), 'weight' => fake()->numberBetween(10, 300)],
                ['name' => fake()->domainName(), 'price' => 525, 'seller_id' => $user_id->id, 'description' => fake()->sentence(10, true), 'weight' => fake()->numberBetween(10, 300)],
                ['name' => fake()->domainName(), 'price' => 525, 'seller_id' => $user_id->id, 'description' => fake()->sentence(10, true), 'weight' => fake()->numberBetween(10, 300)],
            ],
            ['name', 'price', 'seller_id']
        );
    }
}
