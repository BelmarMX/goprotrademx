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
        DB::table('galleries')->insert([
                'insertion_code'    => uniqid('BAN')
            ,   'type'              => 'mixed'
            ,   'title'             => 'Banner'
            ,   'slug'              => 'banner'
            ,   'summary'           => 'Galería de banners en portada'
            ,   'created_at'        => \Carbon\Carbon::now()
        ]);
    }
}
