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
         DB::table('user')->insert([
            'nama' => 'beathris',
            'username' => 'beathris',
            'email' => 'beathris@gmail.com',
            'password' => 'admin123',
            'telepon'=>'085123456788',
            'foto' => 'assets/photo/admin/beathris.jpg',
            'role_id' => 1,
        ]);

    }
}
