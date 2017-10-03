<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = array(
            array(
                'name' => 'admin',
                'password' => bcrypt('123123'),
                'role_id' => 1

            ));

        DB::table('users')->insert($users);
    }
}
