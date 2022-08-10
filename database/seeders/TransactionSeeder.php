<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Transaction::create([
            "wallet_id" => 1,
            "amount" => 2500000,
            "tipe" => "credit",
            "balance_after" => 2500000,
            "description" => "testing pemasukan"
        ]);
        \App\Models\Transaction::create([
            "wallet_id" => 1,
            "amount" => 2500000,
            "tipe" => "debit",
            "balance_after" => 0,
            "description" => "testing pengeluaran"
        ]);
    }
}
