<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'nama' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'telpon'=>'085123456788',
            'role_id' => 1,
        ]);

    }
}
