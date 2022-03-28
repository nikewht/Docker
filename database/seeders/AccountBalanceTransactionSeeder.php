<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AccountBalanceTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('account_balance_transactions')->insert(
            [
                [
                    'account_balance_id' => 1,
                    'amount' => 100,
                    'type' => 2,
                    'comment' => 'Выплата',
                    'created_at' => '2022-03-19 07:18:56'
                ],
                [
                    'account_balance_id' => 1,
                    'amount' => 100,
                    'type' => 2,
                    'comment' => 'Выплата',
                    'created_at' => '2022-03-21 07:18:56'
                ],
                [
                    'account_balance_id' => 1,
                    'amount' => 100,
                    'type' => 2,
                    'comment' => 'Выплата',
                    'created_at' => Carbon::now()
                ],
            ]);
    }
}
