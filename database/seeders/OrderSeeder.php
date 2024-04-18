<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for ($i=1; $i <= 10; $i++) {
            for ($j=1; $j <= 10; $j++) {
                DB::table('orders') -> insert([
                    'user_id' => $i,
                    'cart_id' => $j,
                    'payment_id' => 1,
                    'total_amount' => 1000,
                ]);
            }
        }
    }
}
