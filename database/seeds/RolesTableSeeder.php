<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = array(
            array(
                'id' => 1,
                'name' => 'Admin'
            ),
            array(
                'id' => 2,
                'name' => 'Doctor'
            ),
            array(
                'id' => 3,
                'name' => 'Paciente'
            ));

        DB::table('roles')->insert($roles);
    }
}
