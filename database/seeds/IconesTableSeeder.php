<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IconesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('icons')->insert(['nomeicone' => 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://maps.google.com/mapfiles/kml/shapes/parking_lot_maps.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/color/48/000000/street-view.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/color/48/000000/marker.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/material/32/000000/collaboration.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/windows/32/000000/approve.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/windows/32/000000/disapprove.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/windows/32/000000/good-decision.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/windows/32/000000/bad-decision.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/windows/32/000000/commercial.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/windows/32/000000/idea.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/windows/32/000000/male.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/windows/32/000000/female.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/windows/32/000000/call-male.png']);
        DB::table('icons')->insert(['nomeicone' => 'https://img.icons8.com/windows/32/000000/error.png']);
    }
}
