<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartProductSeeder extends Seeder
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
                DB::table('cart_products') -> insert([
                    'cart_id' => $i,
                    'product_id' => $j,
                    'quantity' => 1,
                ]);
            }
        }
    }
}
