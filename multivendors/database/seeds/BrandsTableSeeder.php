<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->insert([
        	[
		        'name' => 'Nikon',
		        'logo' => 'brand_1.jpg',
		        'slug' => 'nikon',
		        'description' => 'test 1',
        	],

        	[
		        'name' => 'Canon',
		        'logo' => 'brand_2.jpg',
		        'slug' => 'canon',
		        'description' => 'test 2',
        	],

        	[
		        'name' => 'Sony',
		        'logo' => 'brand_3.jpg',
		        'slug' => 'soni',
		        'description' => 'test 3',
        	],

        	[
		        'name' => 'Fat Burger',
		        'logo' => 'brand_4.jpg',
		        'slug' => 'fat-burger',
		        'description' => 'test 4',
        	],

        ]);
    }
}
