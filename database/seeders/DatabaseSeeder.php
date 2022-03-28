<?php

namespace Database\Seeders;

use App\Models\AccountBalance;
use App\Models\AccountBalanceTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PixelEventTypeSeeder::class,
            AccountBalanceSeeder::class,
            AccountBalanceTransactionSeeder::class,
        ]);
    }
}
