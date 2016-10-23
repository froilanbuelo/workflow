<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('action_types')->insert([
        	'id' => 1,
            'name' => 'Approve'
        ]);
        DB::table('action_types')->insert([
        	'id' => 2,
            'name' => 'Deny'
        ]);
        DB::table('action_types')->insert([
        	'id' => 3,
            'name' => 'Cancel'
        ]);
        DB::table('action_types')->insert([
        	'id' => 4,
            'name' => 'Restart'
        ]);
        DB::table('action_types')->insert([
        	'id' => 5,
            'name' => 'Resolve'
        ]);
    }
}
