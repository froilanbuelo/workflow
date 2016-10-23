<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_types')->insert([
        	'id' => 1,
            'name' => 'Add Note'
        ]);
        DB::table('activity_types')->insert([
        	'id' => 2,
            'name' => 'Send Email'
        ]);
        DB::table('activity_types')->insert([
        	'id' => 3,
            'name' => 'Add Stakeholders'
        ]);
        DB::table('activity_types')->insert([
        	'id' => 4,
            'name' => 'Remove Stakeholders'
        ]);
    }
}
