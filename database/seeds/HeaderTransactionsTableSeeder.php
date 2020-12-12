<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeaderTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('header_transactions')->insert([
            [
                'transaction_date' => Carbon::now(),
                'total_price' => 4803000,
                'user_id' => random_int(2, 3),
            ],
        ]);
    }
}
