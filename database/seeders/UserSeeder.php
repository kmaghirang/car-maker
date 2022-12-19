<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = new \App\Models\Type([
            'name' => 'Mini Van',
            'details' => 'Mini Van',
            'created_by' => 'seeder',
            'updated_by' => ''
        ]);
        $user->save();
    }
}
