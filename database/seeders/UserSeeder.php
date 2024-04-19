<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::factory(10)->create();
        // Admin
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => '12345@12345.com',
                'email_verified_at' => now(),
                'password' => Hash::make('1234567890'),
                'is_admin' => true,
            ]
        );
    }
}
