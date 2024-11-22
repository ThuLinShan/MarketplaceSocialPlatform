<?php

namespace Database\Seeders;

use App\Models\Buyer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Buyer::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
