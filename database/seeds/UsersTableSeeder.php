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
                'name'          => 'Belmar Alberto'
            ,   'email'         => 'contacto@dispersion.mx'
            ,   'password'      => Hash::make('secret')
            ,   'created_at'    => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
                'name'          => 'Administrador'
            ,   'email'         => 'admin@goprotrademx.com'
            ,   'password'      => Hash::make('WebGo*Pro23%')
            ,   'created_at'    => \Carbon\Carbon::now()
        ]);
    }
}
