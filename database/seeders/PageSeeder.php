<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'id' => 1,
            'page_name' => 'About Us',
            'status' => 'Disabled',
        ]);
        DB::table('pages')->insert([
            'id' => 2,
            'page_name' => 'FAQ',
            'status' => 'Enabled',
        ]);
        DB::table('pages')->insert([
            'id' => 3,
            'page_name' => 'How to Order',
            'status' => 'Enabled',
        ]);
        DB::table('pages')->insert([
            'id' => 4,
            'page_name' => 'Contact us',
            'status' => 'Enabled',
        ]);
        DB::table('pages')->insert([
            'id' => 5,
            'page_name' => 'Term & Conditions',
            'status' => 'Enabled',
        ]);
    }
}
