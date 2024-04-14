<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // id	customer_id	cart_id	payment_method	card_number	expiry_date	cvv	billing_address	created_at	updated_at\
        for ($i=1; $i <= 10; $i++) {
            \App\Models\Payment::create([
                'customer_id' => $i,
                'cart_id' => $i,
                'payment_method' => 'Visa',
                'card_number' => '1234 5678 1234 5678',
                'expiry_date' => '12/24',
                'cvv' => '123',
                'billing_address' => '123 Main St, Springfield, IL 62701',
            ]);
        }
    }
}
