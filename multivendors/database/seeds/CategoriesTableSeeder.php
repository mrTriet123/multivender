<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
	        'parent_id' => 0,
	        'name' => 'A',
	        'slug' => 'a',
	        'description' => 'for test',
	        'path' => '001',
	        'banner' => 'banner_1.jpg'
	    ]);
        
    }
}
