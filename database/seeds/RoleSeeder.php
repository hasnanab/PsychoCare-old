<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Role')->insert([
            'nama_role' => 'Admin',
        ]);
         DB::table('Role')->insert([
              'nama_role' => 'Pasien',
         ]);
          DB::table('Role')->insert([
              'nama_role' => 'Psikiater',
         ]);
    }
}
