<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = new \App\Models\Type([
            'name' => 'Sedan',
            'details' => 'Sedan',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $types->save();

        $types = new \App\Models\Type([
            'name' => 'Coupe',
            'details' => 'Coupe',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $types->save();

        $types = new \App\Models\Type([
            'name' => 'Sports Car',
            'details' => 'Sports Car',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $types->save();

        $types = new \App\Models\Type([
            'name' => 'Hatchback',
            'details' => 'Hatchback',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $types->save();

        $types = new \App\Models\Type([
            'name' => 'SUV',
            'details' => 'SUV',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $types->save();

        $types = new \App\Models\Type([
            'name' => 'Pickup',
            'details' => 'Pickup',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $types->save();

        $types = new \App\Models\Type([
            'name' => 'Mini Van',
            'details' => 'Mini Van',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $types->save();
    }
}
