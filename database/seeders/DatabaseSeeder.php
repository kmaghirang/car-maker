<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(5)->create();
        $this->call(ColorSeeder::class);
        $this->call(ManufacturerSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(CarsSeeder::class);
    }
}
