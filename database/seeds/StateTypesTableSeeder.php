<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state_types')->insert([
        	'id' => 1,
            'name' => 'Start'
        ]);
        DB::table('state_types')->insert([
        	'id' => 2,
            'name' => 'Normal'
        ]);
        DB::table('state_types')->insert([
        	'id' => 3,
            'name' => 'Complete'
        ]);
        DB::table('state_types')->insert([
        	'id' => 4,
            'name' => 'Denied'
        ]);
        DB::table('state_types')->insert([
        	'id' => 5,
            'name' => 'Cancelled'
        ]);
    }
}
