<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Wallet::create([
                'name'    => "perusahaan",
                'balance' => 0,
                'description' => "Ini adalah uang perusahaan"
        ]);
    }
}
