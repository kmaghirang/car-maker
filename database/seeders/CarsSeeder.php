<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = new \App\Models\Cars([
            'name' => 'Vios',
            'details' => 'Vios',
            'created_by' => 'seeder',
            'updated_by' => '',
            'manufacturer'=>1,
            'type'=>1,
            'color'=>3
        ]);
        $cars->save();

        $cars = new \App\Models\Cars([
            'name' => 'Hiace',
            'details' => 'Hiace',
            'created_by' => 'seeder',
            'updated_by' => '',
            'manufacturer'=>1,
            'type'=>1,
            'color'=>6,
        ]);
        $cars->save();

        $cars = new \App\Models\Cars([
            'name' => 'Land Cruiser',
            'details' => 'Land Cruiser',
            'created_by' => 'seeder',
            'updated_by' => '',
            'manufacturer'=>1,
            'type'=>3,
            'color'=>6
        ]);
        $cars->save();
    }
}