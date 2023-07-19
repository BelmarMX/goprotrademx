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
        DB::table('users')->insert([
                'name' => 'Belmar Alberto'
            ,   'email' => 'contacto@dispersion.mx'
            ,   'password' => Hash::make('secret')
        ]);

        DB::table('users')->insert([
                'name' => 'Administrador'
            ,   'email' => 'admin@goprotrademx.com'
            ,   'password' => Hash::make('WebGo*Pro23%')
        ]);
    }
}
