<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_transactions')->insert([
            [
                'transaction_id' => 1,
                'shoe_id' => 1,
                'quantity' => 1,
            ],
            [
                'transaction_id' => 1,
                'shoe_id' => 3,
                'quantity' => 1,
            ],
            [
                'transaction_id' => 1,
                'shoe_id' => 7,
                'quantity' => 1,
            ],
        ]);
    }
}
