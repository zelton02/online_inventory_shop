<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = [
            [
                'name' => 'Laptop',
                'image_url' => 'https://example.com/images/laptop.jpg',
                'price' => 999.99,
                'description' => 'High-performance laptop with SSD storage and HD display.',
                'discount' => 10.00,
                'quantity' => 50,
            ],
            [
                'name' => 'Smartphone',
                'image_url' => 'https://example.com/images/smartphone.jpg',
                'price' => 499.99,
                'description' => 'Latest smartphone model with dual cameras and OLED screen.',
                'discount' => 0.00,
                'quantity' => 100,
            ],
            [
                'name' => 'Bluetooth Speaker',
                'image_url' => 'https://example.com/images/speaker.jpg',
                'price' => 79.99,
                'description' => 'Portable Bluetooth speaker with 20W output and waterproof design.',
                'discount' => 5.00,
                'quantity' => 30,
            ],
            [
                'name' => 'Wireless Headphones',
                'image_url' => 'https://example.com/images/headphones.jpg',
                'price' => 129.99,
                'description' => 'Over-ear wireless headphones with noise cancellation technology.',
                'discount' => 15.00,
                'quantity' => 20,
            ],
            [
                'name' => 'Tablet',
                'image_url' => 'https://example.com/images/tablet.jpg',
                'price' => 299.99,
                'description' => 'Slim and lightweight tablet with touch screen and stylus support.',
                'discount' => 0.00,
                'quantity' => 40,
            ],
            [
                'name' => 'Gaming Console',
                'image_url' => 'https://example.com/images/console.jpg',
                'price' => 399.99,
                'description' => 'Next-gen gaming console with 4K graphics and immersive gameplay.',
                'discount' => 20.00,
                'quantity' => 15,
            ],
            [
                'name' => 'Fitness Tracker',
                'image_url' => 'https://example.com/images/fitness-tracker.jpg',
                'price' => 49.99,
                'description' => 'Activity tracker with heart rate monitor and GPS functionality.',
                'discount' => 0.00,
                'quantity' => 60,
            ],
            [
                'name' => 'Digital Camera',
                'image_url' => 'https://example.com/images/camera.jpg',
                'price' => 349.99,
                'description' => 'Mirrorless digital camera with interchangeable lenses and 4K video recording.',
                'discount' => 10.00,
                'quantity' => 25,
            ],
            [
                'name' => 'External SSD Drive',
                'image_url' => 'https://example.com/images/ssd-drive.jpg',
                'price' => 129.99,
                'description' => 'High-speed external SSD drive for data storage and backup.',
                'discount' => 0.00,
                'quantity' => 35,
            ],
            [
                'name' => 'Smart Watch',
                'image_url' => 'https://example.com/images/smart-watch.jpg',
                'price' => 199.99,
                'description' => 'Fitness-focused smart watch with health monitoring and GPS tracking.',
                'discount' => 5.00,
                'quantity' => 50,
            ],
            // Add more products here...
        ];

        // Insert products into the database
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
