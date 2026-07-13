<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            StateSeeder::class,
            UserSeeder::class,
            ComplaintSeeder::class,
            ComplaintRemarkSeeder::class,
        ]);
    }
}
