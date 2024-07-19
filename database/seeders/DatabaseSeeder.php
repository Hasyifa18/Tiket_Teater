<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\SeatsSeeder as SeedersSeatsSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SeatsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            SeedersSeatsSeeder::class,
        ]);
    }
}
