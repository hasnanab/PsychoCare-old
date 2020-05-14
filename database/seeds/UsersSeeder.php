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
            'foto' => 'assets/photo/admin/IMG_20190328_000042.jpg',
            'role_id' => 1,
        ]);
        DB::table('user')->insert([
            'nama' => 'Beni',
            'username' => 'beni',
            'email' => 'beni@gmail.com',
            'password' => 'admin123',
            'telepon'=>'085123456788',
            'foto' => 'assets/photo/pasien/IMG_20191010_124734.jpg',
            'role_id' => 2,
        ]);

    }
}
