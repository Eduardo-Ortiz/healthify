<?php

use Illuminate\Database\Seeder;

class SpecialitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $specialities = array(
            array(
                'id' => 1,
                'nombre' => 'Medico General'
            ),
            array(
                'id' => 2,
                'nombre' => 'Cardiologo'
            ));

        DB::table('specialities')->insert($specialities);
    }
}
