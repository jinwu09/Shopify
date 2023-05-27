<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Item;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::upsert(
            [
                ['item_id' => Item::first()->id, 'user_id' => User::first()->id, 'total' => 10, 'status' => "ongoing"],
                ['item_id' => Item::first()->id, 'user_id' => User::first()->id, 'total' => 10, 'status' => "ongoing"],
                ['item_id' => Item::first()->id, 'user_id' => User::first()->id, 'total' => 10, 'status' => "ongoing"],
                ['item_id' => Item::first()->id, 'user_id' => User::first()->id, 'total' => 10, 'status' => "not delivered"],
                ['item_id' => Item::first()->id, 'user_id' => User::first()->id, 'total' => 10, 'status' => "not delivered"],
                ['item_id' => Item::first()->id, 'user_id' => User::first()->id, 'total' => 10, 'status' => "not delivered"],
                ['item_id' => Item::first()->id, 'user_id' => User::first()->id, 'total' => 10, 'status' => "received"],
                ['item_id' => Item::first()->id, 'user_id' => User::first()->id, 'total' => 10, 'status' => "received"],
                ['item_id' => Item::first()->id, 'user_id' => User::first()->id, 'total' => 10, 'status' => "received"],
            ],
            ['item_id', 'user_id', 'total']
        );
    }
}
