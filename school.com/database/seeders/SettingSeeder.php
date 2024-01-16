<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting')->truncate();

        // Seed the table with fake data
        $settings = [
            'paypal_email' => 'your-paypal-email@example.com',
            'stripe_key' => 'your-stripe-key',
            'stripe_secret' => 'your-stripe-secret',
            'fevicon_icon' => '/images/favicon.png',
            'logo' => '/images/logo.png',
            'small_logo' => '/images/logo-sm.png',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('setting')->insert($settings);
    }
}
