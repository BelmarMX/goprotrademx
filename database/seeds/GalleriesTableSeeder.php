<?php

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'insertion_code' => uniqid('BAN')
            ,   'type'      => 'mixed'
            ,   'title'     => 'Banner'
            ,   'slug'      => 'banner'
            ,   'summary'   => 'Galería de banners en portada'
        ]);
    }
}
