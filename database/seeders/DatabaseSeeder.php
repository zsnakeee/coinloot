<?php

namespace Database\Seeders;

use App\Models\Bonus;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'snake',
            'email' => 'ziadtallat33@gmail.com',
            'password' => \Hash::make('password'),
            'registered_ip' => "197.165.233.159",
            'last_login_ip' => "197.165.233.159",
            'last_seen_at' => now(),
            'user_agent' => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/9",
            'is_admin' => true,
        ]);

        Payment::create([
            'name' => 'PayPal',
            'currency' => 'USD',
            'photo_path' => 'payments/paypal.png',
        ]);

        Bonus::create([
            'code' => 'WELCOME200',
            'points' => 200,
            'max_uses' => 5,
        ]);

        User::factory(100)->create();
    }
}
