<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('transactions')->insert([
            [
                'no_transaction' => '001',
                'transaction_date' => '2018-08-01',
            ],[
                'no_transaction' => '002',
                'transaction_date' => '2018-08-02',
            ]
        ]);

        DB::table('transaction_details')->insert([
            [
                'transaction_id' => '1',
                'item' => 'kopi',
                'quantity' => '2',
            ], [
                'transaction_id' => '1',
                'item' => 'gula',
                'quantity' => '3',
            ], [
                'transaction_id' => '2',
                'item' => 'susu',
                'quantity' => '7',
            ], [
                'transaction_id' => '2',
                'item' => 'kopi',
                'quantity' => '5',
            ],
        ]);
    }
}
