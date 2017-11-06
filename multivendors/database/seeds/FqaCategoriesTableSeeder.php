<?php

use Illuminate\Database\Seeder;

class FqaCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('fqa_categories')->insert([
        	[
		        'name' => 'Test1',
		        'status' => 'Action'
        	],
        	[
		        'name' => 'Test2',
		        'status' => 'Action'
        	],
        	[
		        'name' => 'Test3',
		        'status' => 'Action'
        	],
        	[
		        'name' => 'Test4',
		        'status' => 'Action'
        	],
        	[
		        'name' => 'Test5',
		        'status' => 'Action'
        	],

        ]);
    }
}
