<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $manufacturers = new \App\Models\Manufacturer([
            'name' => 'Toyota',
            'details' => 'Toyota',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $manufacturers->save();

        $manufacturers = new \App\Models\Manufacturer([
            'name' => 'Honda',
            'details' => 'Honda',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $manufacturers->save();
    }
}
