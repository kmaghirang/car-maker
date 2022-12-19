<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = new \App\Models\Color([
            'name' => 'red',
            'details' => 'color red',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $colors->save();

        $colors = new \App\Models\Color([
            'name' => 'orange',
            'details' => 'color orange',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $colors->save();

        $colors = new \App\Models\Color([
            'name' => 'yellow',
            'details' => 'color yellow',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $colors->save();

        $colors = new \App\Models\Color([
            'name' => 'green',
            'details' => 'color green',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $colors->save();

        $colors = new \App\Models\Color([
            'name' => 'blue',
            'details' => 'color blue',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $colors->save();

        $colors = new \App\Models\Color([
            'name' => 'indigo',
            'details' => 'color indigo',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $colors->save();

        $colors = new \App\Models\Color([
            'name' => 'violet',
            'details' => 'color violet',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $colors->save();
    }
}
